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

    public function get_all() 
    {
        // ✅ Current page
        $page = 1;
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $page = (int)$this->io->get('page');
        }

        // ✅ Search keyword
        $q = '';
        if (isset($_GET['q']) && !empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        // ✅ Records per page
        $records_per_page = 5;

        // ✅ Get paginated data from model
        $all = $this->StudentsModel->page($q, $records_per_page, $page);
        $data['students'] = $all['records'];
        $total_rows = $all['total_rows'];

        // ✅ Pagination options
        $this->pagination->set_options([
            'first_link'     => '⏮ 🦇 First',
            'last_link'      => 'Last ☠️ ⏭',
            'next_link'      => 'Next 🕷️ →',
            'prev_link'      => '← 🖤 Prev',
            'page_delimiter' => '&page='
        ]);
        
        $this->pagination->set_theme('bootstrap'); // or tailwind, custom

        // ✅ Initialize pagination
        $this->pagination->initialize(
            $total_rows, 
            $records_per_page, 
            $page, 
            site_url('get_all').'?q='.$q
        );

        // ✅ Paginated links
        $data['page'] = $this->pagination->paginate();
        $data['search'] = $q;

        $this->call->view('get_all', $data);
    }
}
