<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stores extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Stores_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {

        $data['store'] = $this->Stores_model->get_stores();
        $data['title'] = 'prevádzka';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('stores/index', $data);
        $this->load->view('template/footer');
        $this->load->view('stores/stores_js');
    }

    public function view($id = NULL) {
        $data['store_item'] = $this->Stores_model->get_stores($id);

        if (empty($data['store_item'])) {
            show_404();
        }

        $data['title'] = 'Detail prevádzky';
        $data['nazov'] = $data['store_item']['Názov'];

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('stores/view', $data);
        $this->load->view('template/footer');
        $this->load->view('stores/stores_js');
    }

    public function insert() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Pridanie prevádzky';

        $this->form_validation->set_rules('Názov', 'Názov', 'required');
        $this->form_validation->set_rules('m2', 'Plocha', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('stores/insert');
            $this->load->view('template/footer');
            $this->load->view('stores/stores_js');
        } else {
            $this->Stores_model->set_stores();
            redirect(base_url() . 'index.php/stores');
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['store_item'] = $this->Stores_model->get_stores($id);

        $data['title'] = 'Úprava prevádzky';
        $data['nazov'] = $data['store_item']['Názov'];

        $this->form_validation->set_rules('idPrevádzka', 'ID Prevádzky', 'required');
        $this->form_validation->set_rules('Názov', 'Názov', 'required');
        $this->form_validation->set_rules('m2', 'Plocha', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('stores/edit', $data);
            $this->load->view('template/footer');
            $this->load->view('stores/stores_js');
        } else {
            $this->Stores_model->set_stores($id);
            redirect(base_url() . 'index.php/stores');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $store_item = $this->Stores_model->get_stores($id);

        $this->Stores_model->delete_stores($id);
        redirect(base_url() . 'index.php/stores');
    }

    public function stores_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $stores = $this->Stores_model->get_stores2();
        $data = array();

        foreach ($stores->result() as $r) {
            $data[] = array(
                $r->idPrevádzka,
                $r->Názov,
                $r->m2,
                $r->Elektrina,
                $r->Plyn,
                $r->Voda);
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $stores->num_rows(),
            "recordsFiltered" => $stores->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }
}