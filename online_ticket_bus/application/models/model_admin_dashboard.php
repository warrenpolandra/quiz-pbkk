<?php

class Model_admin_dashboard extends CI_Model {

    public function show_data() {
        $this->db->from('tb_bus');
        $total_buses_amount = $this->db->get()->num_rows();

        $this->db->from('tb_route');
        $total_routes_amount = $this->db->get()->num_rows();

        $this->db->from('tb_schedule');
        $total_schedules_amount = $this->db->get()->num_rows();

        $this->db->select_sum('profit');
        $this->db->from('tb_transaction');
        $total_profit_amount = 'Rp ' . number_format($this->db->get()->row()->profit, 0, '.', '.');

        return (object) array(
            'total_buses' => $total_buses_amount,
            'total_profit' => $total_profit_amount,
            'total_routes' => $total_routes_amount,
            'total_schedules' => $total_schedules_amount,
        );
    }

}