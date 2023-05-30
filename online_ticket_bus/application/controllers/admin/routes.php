<?php

class Routes extends CI_Controller{

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
        $data['routes'] = $this->model_routes->show_data();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/routes', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add_route()
    {
        $route_from = $this->input->post('route_from');
        $route_to = $this->input->post('route_to');
        $duration = $this->input->post('duration');
        $base_price = $this->input->post('base_price');

        $data = array(
            'route_from'    => $route_from,
            'route_to'      => $route_to,
            'duration'      => $duration,
            'base_price'    => $base_price,
        );

        $this->model_routes->add_new_route($data, 'tb_route');
        redirect('admin/routes/index');
    }
    
    public function edit_route($id)
    {
        $where = array('id' => $id);
        $data['route'] = $this->model_routes->edit_route($where, 'tb_route')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_route', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id             = $this->input->post('id');
        $route_from     = $this->input->post('route_from');
        $route_to       = $this->input->post('route_to');
        $duration       = $this->input->post('duration');
        $base_price     = $this->input->post('base_price');

        $data = array(
            'route_from'    => $route_from,
            'route_to'      => $route_to,
            'duration'      => $duration,
            'base_price'    => $base_price,
        );
        
        $where = array(
            'id' => $id
        );

        $this->model_routes->update_data($where,$data,'tb_route');
        redirect('admin/routes/index');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->model_routes->delete_data($where, 'tb_route');
        redirect('admin/routes/index');
    }
}