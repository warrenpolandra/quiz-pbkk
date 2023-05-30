<?php

class Model_tickets extends CI_Model {

    public function find_bus($data){

        $date = $data['date'];
        $from = $data['from'];
        $to = $data['to'];

        $this->db->select('tb_schedule.id, tb_company.name, tb_route.base_price, tb_schedule.time, tb_schedule.date, tb_company.image, 
                      TIME(TIMESTAMP(tb_schedule.time) + INTERVAL tb_route.duration HOUR_SECOND) AS arrival_time, tb_bus.capacity');
        $this->db->from('tb_schedule');
        $this->db->join('tb_route', 'tb_schedule.route_id = tb_route.id');
        $this->db->join('tb_bus', 'tb_schedule.bus_id = tb_bus.id');
        $this->db->join('tb_company', 'tb_bus.company_id = tb_company.id');

        if ($date) {
            $this->db->where('tb_schedule.date', $date);
        }
        if ($from) {
            $this->db->where('tb_route.route_from', $from);
        }
        if ($to) {
            $this->db->where('tb_route.route_to', $to);
        }

        return $this->db->get();
    }

    public function getRouteById($schedule_id){
        $this->db->select('base_price');
        $this->db->from('tb_route');
        $this->db->join('tb_schedule', 'tb_route.id = tb_schedule.route_id');
        $this->db->where('tb_schedule.id', $schedule_id);
       $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function buy_ticket($where) {
        $this->db->select('tb_schedule.id AS schedule_id, tb_company.name, tb_route.id, tb_route.route_from, tb_route.route_to, tb_route.base_price, tb_schedule.time, tb_schedule.date, tb_company.image, 
                          TIME(TIMESTAMP(tb_schedule.time) + INTERVAL tb_route.duration HOUR_SECOND) AS arrival_time, tb_bus.capacity');
        $this->db->from('tb_schedule');
        $this->db->join('tb_route', 'tb_schedule.route_id = tb_route.id');
        $this->db->join('tb_bus', 'tb_schedule.bus_id = tb_bus.id');
        $this->db->join('tb_company', 'tb_bus.company_id = tb_company.id');
        $this->db->where($where);
    
        return $this->db->get();
    }

    public function insert($data, $table) {
        $this->db->insert($table,$data);
    }
}