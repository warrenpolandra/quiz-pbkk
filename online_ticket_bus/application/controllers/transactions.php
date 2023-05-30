<?php

class Transactions extends CI_Controller{

    public function __construct() {
        parent::__construct();
        
        if($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Not Logged In Yet
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
          redirect('auth/login');
        }
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $data['transactions'] = $this->model_transactions->show_data_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('transactions', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['transactions'] = $this->model_transactions->show_detail_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('transaction_detail', $data);
        $this->load->view('templates/footer');
    }
}