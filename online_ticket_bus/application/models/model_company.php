<?php

class Model_company extends CI_Model {

    public function show_data(){
        return $this->db->get('tb_company');
    }

    public function add_new_company($data,$table){
        $this->db->insert($table,$data);
    }

    public function edit_company($where, $table){
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