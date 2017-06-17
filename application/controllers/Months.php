<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Months extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Months_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {

        $data['month'] = $this->Months_model->get_months();
        $data['title'] = 'mesiac';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('months/index', $data);
        $this->load->view('template/footer');
        $this->load->view('months/months_js');
    }

    public function view($id = NULL) {
        $data['month_item'] = $this->Months_model->get_months($id);

        if (empty($data['month_item'])) {
            show_404();
        }

        $data['title'] = 'Detail mesiaca';
        $data['nazov'] = $data['month_item']['Názov'];

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('months/view', $data);
        $this->load->view('template/footer');
        $this->load->view('months/months_js');
    }

    public function insert() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Pridanie mesiaca';

        $this->form_validation->set_rules('Názov', 'Názov', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('months/insert');
            $this->load->view('template/footer');
            $this->load->view('months/months_js');
        } else {
            $this->Months_model->set_months();
            redirect(base_url() . 'index.php/months');
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['month_item'] = $this->Months_model->get_months($id);

        $data['title'] = 'Úprava mesiaca';
        $data['nazov'] = $data['month_item']['Názov'];

        $this->form_validation->set_rules('idPrevádzka', 'ID Prevádzky', 'required');
        $this->form_validation->set_rules('Názov', 'Názov', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('months/edit', $data);
            $this->load->view('template/footer');
            $this->load->view('months/months_js');
        } else {
            $this->Months_model->set_months($id);
            redirect(base_url() . 'index.php/months');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $month_item = $this->Months_model->get_months($id);

        $this->Months_model->delete_months($id);
        redirect(base_url() . 'index.php/months');
    }

    public function months_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $months = $this->Months_model->get_months2();
        $data = array();

        foreach ($months->result() as $r) {
            $data[] = array(
                $r->idMesiac,
                $r->Názov);
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $months->num_rows(),
            "recordsFiltered" => $months->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }
}