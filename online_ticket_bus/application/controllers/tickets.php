<?php

class Tickets extends CI_Controller{

    public function index()
    {
        $data['tickets'] = '';
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tickets', $data);
        $this->load->view('templates/footer');
    }

    public function find_bus()
    {
        $date = $this->input->post('date');
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        
        $data = array(
            'date'          => $date,
            'from'          => $from,
            'to'            => $to,
        );

        $result = $this->model_tickets->find_bus($data);
        $tickets['tickets'] = $result->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tickets', $tickets);
        $this->load->view('templates/footer');
    }

    public function buy_ticket($id)
    {
        $where = array('tb_schedule.id' => $id);
        $data['ticket'] = $this->model_tickets->buy_ticket($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('buy_ticket', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $where = array('tb_schedule.id' => $id);
        $data['transactions'] = $this->model_transactions->show_detail_by_id($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('transaction_detail', $data);
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $id = $this->session->userdata('id');
        $schedule_id       = $this->input->post('schedule_id');
        $ticket_number  = $this->input->post('ticket_number');
        $payment_method = $this->input->post('payment_method');
        
        $schedule = $this->model_tickets->getRouteById($schedule_id);
        $price = $schedule->base_price;
        $profit = $ticket_number * $price;

        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'schedule_id'       => $schedule_id,
            'ticket_number'     => $ticket_number,
            'payment_method'    => $payment_method,
            'user_id'           => $id,
            'profit'            => $profit,
            'time'              => date('H:i:s'),
            'date'              => date('Y-m-d')
        );

        $this->model_tickets->insert($data, 'tb_transaction');
        redirect('transactions/index');
    }
}