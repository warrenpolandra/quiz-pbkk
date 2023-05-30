<?php

class Buses extends CI_Controller{

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
        $data['buses'] = $this->model_buses->show_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/buses', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add_bus()
    {
        $company_id = $this->input->post('company_id');
        $type = $this->input->post('type');
        $plate_number = $this->input->post('plate_number');
        $capacity = $this->input->post('capacity');
        
        $data = array(
            'company_id'    => $company_id,
            'type'          => $type,
            'plate_number'  => $plate_number,
            'capacity'      => $capacity,
        );

        $this->model_buses->add_new_bus($data, 'tb_bus');
        redirect('admin/buses/index');
    }
    
    public function edit_bus($id)
    {
        $where = array('id' => $id);
        $data['bus'] = $this->model_buses->edit_bus($where, 'tb_bus')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_bus', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id             = $this->input->post('id');
        $company_id     = $this->input->post('company_id');
        $type           = $this->input->post('type');
        $plate_number   = $this->input->post('plate_number');
        $capacity       = $this->input->post('capacity');

        $data = array(
            'company_id'    => $company_id,
            'type'          => $type,
            'plate_number'  => $plate_number,
            'capacity'      => $capacity,
        );
        
        $where = array(
            'id' => $id
        );

        $this->model_buses->update_data($where,$data,'tb_bus');
        redirect('admin/buses/index');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->model_buses->delete_data($where, 'tb_bus');
        redirect('admin/buses/index');
    }
}