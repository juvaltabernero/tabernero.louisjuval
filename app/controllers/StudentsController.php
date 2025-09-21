<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentsController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->library('pagination');
        $this->call->library('session'); 
        $this->call->model('StudentsModel'); // make sure model is loaded
    }

    public function create() {
        if($this->form_validation->submitted()){
            $first_name = $this->io->post('first_name');
            $last_name  = $this->io->post('last_name');
            $email      = $this->io->post('email');

            $this->StudentsModel->create($first_name, $last_name, $email);
            redirect('get_all');
        }
        $this->call->view('create');
    }

    public function update($id) {
        $student = $this->StudentsModel->get_one($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name'  => $_POST['last_name'],
                'email'      => $_POST['email']
            ];
            $this->StudentsModel->update($id, $data);
            redirect('get_all');
        }
        $this->call->view('/update', ['student' => $student]);
    }

    public function delete($id) {
        $this->StudentsModel->delete($id);
        redirect('get_all');
    }

    public function get_all($page = 1) {
        try {
            $per_page = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 5;
            $allowed_per_page = [5, 10, 15, 20];
            if (!in_array($per_page, $allowed_per_page)) $per_page = 5;
    
            // 🔎 Search keyword
            $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    
            // 🔹 Count total rows (with search filter)
            if (!empty($search)) {
                $total_rows = $this->StudentsModel->count_search_records($search);
            } else {
                $total_rows = $this->StudentsModel->count_all_records();
            }
    
            $page   = max(1, (int)$page);
            $offset = ($page - 1) * $per_page;
            $limit_clause = "LIMIT {$offset}, {$per_page}";
    
            $pagination_data = $this->pagination->initialize(
                $total_rows,
                $per_page,
                $page,
                'get_all',
                5
            );
    
            // 🔹 Get paginated records (search OR all)
            if (!empty($search)) {
                $data['students'] = $this->StudentsModel->search($search, $limit_clause);
            } else {
                $data['students'] = $this->StudentsModel->get_records_with_pagination($limit_clause);
            }
    
            $data['total_records']   = $total_rows;
            $data['pagination_data'] = $pagination_data;
            $data['pagination_links'] = $this->pagination->paginate();
            $data['search'] = $search; // keep search text
    
            $this->call->view('get_all', $data);
        } catch (Exception $e) {
            $error_msg = urlencode($e->getMessage());
            redirect('get_all/1?error=' . $error_msg);
        }
    }

    public function search() {
        $q = $this->io->get('q');
        $model = new StudentsModel();

        // If empty query, return all results
        if (empty(trim($q))) {
            echo json_encode([]);
            return;
        }

        $results = $model->search($q);

        header('Content-Type: application/json');
        echo json_encode($results);
    }
}
