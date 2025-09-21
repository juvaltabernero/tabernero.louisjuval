<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentsModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function create($first_name, $last_name, $email) {
        $data = [
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'email'      => $email
        ];
        return $this->db->table($this->table)->insert($data);
    }   

    public function get_one($id) {
        return $this->db->table($this->table)
                        ->where($this->primary_key, $id)
                        ->get();
    }

    public function delete($id) {
        return $this->db->table($this->table)
                        ->where($this->primary_key, $id)
                        ->delete();
    }

    /**
     * Unified pagination + search (like Author_model::page)
     */
    public function page($q = '', $records_per_page = null, $page = null) {
        if (is_null($page)) {
            // Return all if no pagination requested
            return $this->db->table($this->table)->get_all();
        } else {
            $query = $this->db->table($this->table);

            if (!empty($q)) {
                $query->like('id', '%'.$q.'%')
                      ->or_like('first_name', '%'.$q.'%')
                      ->or_like('last_name', '%'.$q.'%')
                      ->or_like('email', '%'.$q.'%');
            }

            // Clone query before applying pagination for total count
            $countQuery = clone $query;
            $data['total_rows'] = $countQuery->select_count('*', 'count')
                                             ->get()['count'];

            // Paginated records
            $data['records'] = $query->pagination($records_per_page, $page)
                                     ->get_all();

            return $data;
        }
    }
}
