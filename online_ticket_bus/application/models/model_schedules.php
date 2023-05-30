<?php

class Model_schedules extends CI_Model {

    public function show_data(){
        $this->db->select('tb_schedule.id, tb_company.name, tb_route.route_from, tb_route.route_to, tb_schedule.date, tb_schedule.time, 
                      TIME(TIMESTAMP(tb_schedule.time) + INTERVAL tb_route.duration HOUR_SECOND) AS arrival_time, tb_bus.capacity');
        $this->db->from('tb_schedule');
        $this->db->join('tb_route', 'tb_schedule.route_id = tb_route.id');
        $this->db->join('tb_bus', 'tb_schedule.bus_id = tb_bus.id');
        $this->db->join('tb_company', 'tb_bus.company_id = tb_company.id');
    
        return $this->db->get();
    }

    public function add_new_schedule($data,$table){
        $this->db->insert($table,$data);
    }

    public function edit_schedule($where, $table){
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