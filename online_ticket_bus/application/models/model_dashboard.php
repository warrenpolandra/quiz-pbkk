<?php

class Model_dashboard extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function show_data($id) {
        $this->db->from('tb_bus');
        $total_buses_amount = $this->db->get()->num_rows();

        $this->db->from('tb_route');
        $total_routes_amount = $this->db->get()->num_rows();

        $this->db->select_sum('profit');
        $this->db->from('tb_transaction');
        $total_profit_amount = 'Rp ' . number_format($this->db->get()->row()->profit, 0, '.', '.');

        $this->db->from('tb_transaction');
        $this->db->where('user_id', $id);
        $total_transactions_amount = $this->db->get()->num_rows();

        return (object) array(
            'total_buses' => $total_buses_amount,
            'total_profit' => $total_profit_amount,
            'total_routes' => $total_routes_amount,
            'total_transactions' => $total_transactions_amount
        );
    }

}