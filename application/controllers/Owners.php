<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Owners extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Owners_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {

        $data['owners'] = $this->Owners_model->get_owners();
        $data['title'] = 'prevádzka_has_majiteľ';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('owners/index', $data);
        $this->load->view('template/footer');
        $this->load->view('owners/owners_js');
    }

    public function view($id = NULL) {
        $data['owners_item'] = $this->Owners_model->get_owners($id);

        if (empty($data['owners_item'])) {
            show_404();
        }

        $data['title'] = 'Detail majiteľa prevádzky';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('owners/view', $data);
        $this->load->view('template/footer');
        $this->load->view('owners/owners_js');
    }

    public function insert() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Pridanie majiteľa prevádzky';

        $this->form_validation->set_rules('Prevádzka_idPrevádzka', 'ID Prevádzky', 'required');
        $this->form_validation->set_rules('Majiteľ_idMajiteľ', 'ID Majiteľa', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('owners/insert');
            $this->load->view('template/footer');
            $this->load->view('owners/owners_js');
        } else {
            $this->Owners_model->set_owners();
            redirect(base_url() . 'index.php/owners');
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['owners_item'] = $this->Owners_model->get_owners($id);

        $data['title'] = 'Úprava majiteľa prevádzky';

        $this->form_validation->set_rules('Prevádzka_idPrevádzka', 'ID Prevádzky', 'required');
        $this->form_validation->set_rules('Majiteľ_idMajiteľ', 'ID Majiteľa', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('owners/edit', $data);
            $this->load->view('template/footer');
            $this->load->view('owners/owners_js');
        } else {
            $this->Owners_model->set_owners($id);
            redirect(base_url() . 'index.php/owners');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $energies_item = $this->Owners_model->get_owners($id);

        $this->Owners_model->delete_owners($id);
        redirect(base_url() . 'index.php/owners');
    }

    public function rents_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $owners = $this->Owners_model->get_energies2();
        $data = array();

        foreach ($owners->result() as $r) {
            $data[] = array(
                $r->Prevádzka_idPrevádzka,
                $r->Majiteľ_idMajiteľ);
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $owners->num_rows(),
            "recordsFiltered" => $owners->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }
}