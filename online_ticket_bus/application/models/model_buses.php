<?php

class Model_buses extends CI_Model {

    public function show_data(){
        $this->db->select('tb_bus.id, tb_company.name, tb_bus.type, tb_bus.plate_number, tb_bus.capacity');
        $this->db->from('tb_bus');
        $this->db->join('tb_company', 'tb_bus.company_id = tb_company.id');
        return $this->db->get();
    }

    public function add_new_bus($data,$table){
        $this->db->insert($table,$data);
    }

    public function edit_bus($where, $table){
        return $this->db->get_where($table,$where);
    }

    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}