<?php

class Routes extends CI_Controller{

    public function index()
    {
        $data['routes'] = $this->model_routes->show_data();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('routes', $data);
        $this->load->view('templates/footer');
    }
}