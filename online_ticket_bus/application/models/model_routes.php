<?php

class Model_routes extends CI_Model {

    public function show_data(){
        $routes = $this->db->get('tb_route')->result();

        foreach ($routes as $route) {
            $route->base_price = 'Rp ' . number_format($route->base_price, 0, ',', '.');
        }
        return $routes;
    }

    public function add_new_route($data,$table){
        $this->db->insert($table,$data);
    }

    public function edit_route($where, $table){
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