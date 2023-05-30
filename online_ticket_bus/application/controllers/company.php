<?php

class Company extends CI_Controller{

    public function index()
    {
        $data['companies'] = $this->model_company->show_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('company', $data);
        $this->load->view('templates/footer');
    }
}