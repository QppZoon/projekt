<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rents extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rents_model');
        $this->load->model('Floors_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {

        $data['rent'] = $this->Rents_model->get_rents();
        $data['title'] = 'nájom';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('rents/index', $data);
        $this->load->view('template/footer');
        $this->load->view('rents/rents_js');
    }

    public function view($id = NULL) {
        $data['rent_item'] = $this->Rents_model->get_rents($id);

        if (empty($data['rent_item'])) {
            show_404();
        }

        $data['title'] = 'Detail nájmu';
        $data['najom'] = $data['rent_item']['idNájom'];

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('rents/view', $data);
        $this->load->view('template/footer');
        $this->load->view('rents/rents_js');
    }

    public function insert() {
        $this->load->helper('form');
        $this->load->library('form_validation');


        $data['floor_item'] = $this->Floors_model->get_floors();

        $data['title'] = 'Pridanie nájmu';

        $this->form_validation->set_rules('Cena_za_m2', 'Cena za m2', 'required');
        $this->form_validation->set_rules('Poschodie_idPoschodie', 'ID Poschodia', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('rents/insert');
            $this->load->view('template/footer');
            $this->load->view('rents/rents_js');
        } else {
            $this->Rents_model->set_rents();
            redirect(base_url() . 'index.php/rents');
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['rent_item'] = $this->Rents_model->get_rents($id);

        $data['title'] = 'Úprava nájmu';
        $data['najom'] = $data['rent_item']['idNájom'];

        $this->form_validation->set_rules('idNájom', 'ID Nájmu', 'required');
        $this->form_validation->set_rules('Cena_za_m2', 'Cena za m2', 'required');
        $this->form_validation->set_rules('idPoschodie', 'ID poschodia', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('rents/edit', $data);
            $this->load->view('template/footer');
            $this->load->view('rents/rents_js');
        } else {
            $this->Rents_model->set_rents($id);
            redirect(base_url() . 'index.php/rents');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $floor_item = $this->Rents_model->get_rents($id);

        $this->Rents_model->delete_rents($id);
        redirect(base_url() . 'index.php/rents');
    }

    public function rents_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $rents = $this->Rents_model->get_rents2();
        $data = array();

        foreach ($rents->result() as $r) {
            $data[] = array(
                $r->idNájom,
                $r->Cena_za_m2,
                $r->idPoschodie);
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $rents->num_rows(),
            "recordsFiltered" => $rents->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }
}