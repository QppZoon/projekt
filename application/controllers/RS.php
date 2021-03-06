<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RS extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('RS_model');
        $this->load->model('Stores_model');
        $this->load->model('Rents_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {

        $data['rs'] = $this->RS_model->get_rs();
        $data['title'] = 'prevádzka_has_nájom';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('RS/index', $data);
        $this->load->view('template/footer');
        $this->load->view('RS/rs_js');
    }

    public function view($id = NULL) {
        $data['rs_item'] = $this->RS_model->get_rs($id);

        if (empty($data['rs_item'])) {
            show_404();
        }

        $data['title'] = 'Detail nájmu prevádzky';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('RS/view', $data);
        $this->load->view('template/footer');
        $this->load->view('RS/rs_js');
    }

    public function insert() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['store_item'] = $this->Stores_model->get_stores();
        $data['rent_item'] = $this->Rents_model->get_rents();

        $data['title'] = 'Pridanie nájmu prevádzky';

        $this->form_validation->set_rules('Prevázka_idPrevázka', 'ID Prevádzky', 'required');
        $this->form_validation->set_rules('Nájom_idNájom', 'ID nájmu', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('RS/insert');
            $this->load->view('template/footer');
            $this->load->view('RS/rs_js');
        } else {
            $this->RS_model->set_rs();
            redirect(base_url() . 'index.php/RS');
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['rs_item'] = $this->RS_model->get_rs($id);

        $data['title'] = 'Úprava nájmu prevádzky';

        $this->form_validation->set_rules('idPrevádzka_has_Nájom', 'ID', 'required');
        $this->form_validation->set_rules('Prevázka_idPrevázka', 'ID Prevádzky', 'required');
        $this->form_validation->set_rules('Nájom_idNájom', 'ID nájmu', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('RS/edit', $data);
            $this->load->view('template/footer');
            $this->load->view('RS/rs_js');
        } else {
            $this->RS_model->set_rs($id);
            redirect(base_url() . 'index.php/RS');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $rs_item = $this->RS_model->get_rs($id);

        $this->RS_model->delete_rs($id);
        redirect(base_url() . 'index.php/rs');
    }

    public function rents_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $rs = $this->RS_model->get_rs2();
        $data = array();

        foreach ($rs->result() as $r) {
            $data[] = array(
                $r->idPrevádzka_has_Nájom,
                $r->idPrevádzka,
                $r->idNájom);
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $rs->num_rows(),
            "recordsFiltered" => $rs->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }
}