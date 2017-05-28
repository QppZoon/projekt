<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Floors extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Floors_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {

        $data['floor'] = $this->Floors_model->get_floors();
        $data['title'] = 'poschodie';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('floors/index', $data);
        $this->load->view('template/footer');
        $this->load->view('floors/floors_js');
    }

    public function view($id = NULL) {
        $data['floor_item'] = $this->Floors_model->get_floors($id);

        if (empty($data['floor_item'])) {
            show_404();
        }

        $data['title'] = 'Detail poschodia';
        $data['posch'] = $data['floor_item']['Č_poschodia'];

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('floors/view', $data);
        $this->load->view('template/footer');
        $this->load->view('floors/floors_js');
    }

    public function insert() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Pridanie poschodia';

        $this->form_validation->set_rules('Č_poschodia', 'Číslo poschodia', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('floors/insert');
            $this->load->view('template/footer');
            $this->load->view('floors/floors_js');
        } else {
            $this->Floors_model->set_floors();
            redirect(base_url() . 'index.php/floors');
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['floor_item'] = $this->Floors_model->get_floors($id);

        $data['title'] = 'Úprava poschodia';
        $data['posch'] = $data['floor_item']['Č_poschodia'];

        $this->form_validation->set_rules('idPoschodie', 'ID Poschodia', 'required');
        $this->form_validation->set_rules('Č_poschodia', 'Číslo poschodia', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('floors/edit', $data);
            $this->load->view('template/footer');
            $this->load->view('floors/floors_js');
        } else {
            $this->Floors_model->set_floors($id);
            redirect(base_url() . 'index.php/floors');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $floor_item = $this->Floors_model->get_floors($id);

        $this->Floors_model->delete_floors($id);
        redirect(base_url() . 'index.php/floors');
    }

    public function stores_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $floors = $this->Floors_model->get_floors2();
        $data = array();

        foreach ($floors->result() as $r) {
            $data[] = array(
                $r->idPoschodie,
                $r->Č_poschodia);
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $floors->num_rows(),
            "recordsFiltered" => $floors->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }
}