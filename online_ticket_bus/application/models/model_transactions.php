<?php

class Model_transactions extends CI_Model {

    public function show_data(){
        $this->db->select('tb_transaction.id, tb_transaction.date, tb_transaction.time, tb_user.name, tb_transaction.schedule_id, tb_route.route_from, tb_route.route_to, tb_transaction.ticket_number, tb_transaction.profit, tb_transaction.payment_method');
        $this->db->from('tb_transaction');
        $this->db->join('tb_schedule', 'tb_transaction.schedule_id = tb_schedule.id');
        $this->db->join('tb_route', 'tb_schedule.route_id = tb_route.id');
        $this->db->join('tb_user', 'tb_transaction.user_id = tb_user.id');
        $transactions = $this->db->get()->result();
        foreach ($transactions as $transaction) {
            $transaction->profit = 'Rp ' . number_format($transaction->profit, 0, ',', '.');
        }
        return $transactions;
    }

    public function show_data_by_id($id){
        $this->db->select('tb_transaction.id, tb_transaction.date, tb_transaction.time, tb_user.name, tb_transaction.schedule_id, tb_route.route_from, tb_route.route_to, tb_transaction.ticket_number, tb_transaction.profit, tb_transaction.payment_method');
        $this->db->from('tb_transaction');
        $this->db->join('tb_schedule', 'tb_transaction.schedule_id = tb_schedule.id');
        $this->db->join('tb_route', 'tb_schedule.route_id = tb_route.id');
        $this->db->join('tb_user', 'tb_transaction.user_id = tb_user.id');
        $this->db->where('tb_user.id', $id);
        $transactions = $this->db->get()->result();
        foreach ($transactions as $transaction) {
            $transaction->profit = 'Rp ' . number_format($transaction->profit, 0, ',', '.');
        }
        return $transactions;
    }

    public function show_detail_by_id($id){

        $this->db->select('tb_company.name, tb_user.name AS username, tb_schedule.date AS schedule_date, tb_transaction.date, TIME(TIMESTAMP(tb_schedule.time) + INTERVAL tb_route.duration HOUR_SECOND) AS arrival_time, tb_company.image, tb_transaction.time, tb_schedule.time AS schedule_time, tb_route.base_price, tb_transaction.schedule_id, tb_route.route_from, tb_route.route_to, tb_transaction.ticket_number, tb_transaction.profit, tb_transaction.payment_method');
        $this->db->from('tb_transaction');
        $this->db->join('tb_schedule', 'tb_transaction.schedule_id = tb_schedule.id');
        $this->db->join('tb_route', 'tb_schedule.route_id = tb_route.id');
        $this->db->join('tb_bus', 'tb_schedule.bus_id = tb_bus.id');
        $this->db->join('tb_company', 'tb_bus.company_id = tb_company.id');
        $this->db->join('tb_user', 'tb_transaction.user_id = tb_user.id');
        $this->db->where('tb_transaction.id', $id);
        $transactions = $this->db->get()->result();
        return $transactions;
    }

    public function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}