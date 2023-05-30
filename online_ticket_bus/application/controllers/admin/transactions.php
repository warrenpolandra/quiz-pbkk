<?php

class Transactions extends CI_Controller{

    public function __construct() {
        parent::__construct();
        
        if($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Not Logged In Yet
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
          redirect('auth/login');
        }
    }

    public function index()
    {
        $data['transactions'] = $this->model_transactions->show_data();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/transactions', $data);
        $this->load->view('templates_admin/footer');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->model_transactions->delete_data($where, 'tb_transaction');
        redirect('admin/transactions/index');
    }
}