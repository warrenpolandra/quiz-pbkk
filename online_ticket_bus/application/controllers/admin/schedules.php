<?php

class Schedules extends CI_Controller{

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
        $data['schedules'] = $this->model_schedules->show_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/schedules', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add_schedule()
    {
        $date       = $this->input->post('date');
        $time       = $this->input->post('time');
        $bus_id     = $this->input->post('bus_id');
        $route_id   = $this->input->post('route_id');
        
        $data = array(
            'date'      => $date,
            'time'      => $time,
            'bus_id'    => $bus_id,
            'route_id'  => $route_id,
        );

        $this->model_schedules->add_new_schedule($data, 'tb_schedule');
        redirect('admin/schedules/index');
    }
    
    public function edit_schedule($id)
    {
        $where = array('id' => $id);
        $data['schedule'] = $this->model_schedules->edit_schedule($where, 'tb_schedule')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_schedule', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id         = $this->input->post('id');
        $date       = $this->input->post('date');
        $time       = $this->input->post('time');
        $bus_id     = $this->input->post('bus_id');
        $route_id   = $this->input->post('route_id');
        
        $data = array(
            'date'      => $date,
            'time'      => $time,
            'bus_id'    => $bus_id,
            'route_id'  => $route_id,
        );
        
        $where = array(
            'id' => $id
        );

        $this->model_schedules->update_data($where,$data,'tb_schedule');
        redirect('admin/schedules/index');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->model_schedules->delete_data($where, 'tb_schedule');
        redirect('admin/schedules/index');
    }
}