<?php

class Company extends CI_Controller{

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
        $data['companies'] = $this->model_company->show_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/company', $data);
        $this->load->view('templates_admin/footer');
    }

    public function add_company()
    {
        $name = $this->input->post('name');
        $fleet_number = $this->input->post('fleet_number');

        $image = $_FILES['image']['name'];

        if ($image =''){}else{
            $config ['upload_path'] = './images';
            $config ['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('image')){
                echo "Image Upload Failed";
            } else {
                $image=$this->upload->data('file_name');
            }
        }
        
        $data = array(
            'name'    => $name,
            'fleet_number'  => $fleet_number,
            'image'      => $image,
        );

        $this->model_company->add_new_company($data, 'tb_company');
        redirect('admin/company/index');
    }

    public function edit_company($id)
    {
        $where = array('id' => $id);
        $data['company'] = $this->model_company->edit_company($where, 'tb_company')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_company', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id             = $this->input->post('id');
        $name           = $this->input->post('name');
        $fleet_number   = $this->input->post('fleet_number');

        $data = array(
            'name'          => $name,
            'fleet_number'  => $fleet_number,
        );
        
        $where = array(
            'id' => $id
        );

        $this->model_company->update_data($where,$data,'tb_company');
        redirect('admin/company/index');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->model_company->delete_data($where, 'tb_company');
        redirect('admin/company/index');
    }
}