<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lenergies extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lenergies_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {

        $data['lenergie'] = $this->Lenergies_model->get_lenergies();
        $data['title'] = 'energie';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('lenergies/index', $data);
        $this->load->view('template/footer');
        $this->load->view('lenergies/lenergies_js');
    }

    public function view($id = NULL) {
        $data['lenergie_item'] = $this->Lenergies_model->get_lenergies($id);

        if (empty($data['lenergie_item'])) {
            show_404();
        }

        $data['title'] = 'Detail energie';
        $data['nazov'] = $data['lenergie_item']['Druh_energie'];

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('lenergies/view', $data);
        $this->load->view('template/footer');
        $this->load->view('lenergies/lenergies_js');
    }

    public function insert() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Pridanie energie';

        $this->form_validation->set_rules('Druh_energie', 'Druh energie', 'required');
        $this->form_validation->set_rules('Jednotka', 'Jednotka', 'required');
        $this->form_validation->set_rules('Cena_za_jednotku', 'Cena za jednotku', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('lenergies/insert');
            $this->load->view('template/footer');
            $this->load->view('lenergies/lenergies_js');
        } else {
            $this->Lenergies_model->set_lenergies();
            redirect(base_url() . 'index.php/lenergies');
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['lenergie_item'] = $this->Lenergies_model->get_lenergies($id);

        $data['title'] = 'Úprava energie';
        $data['nazov'] = $data['lenergie_item']['Druh_energie'];

        $this->form_validation->set_rules('idEnergie', 'ID Energie', 'required');
        $this->form_validation->set_rules('Druh_energie', 'Druh energie', 'required');
        $this->form_validation->set_rules('Jednotka', 'Jednotka', 'required');
        $this->form_validation->set_rules('Cena_za_jednotku', 'Cena za jednotku', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('lenergies/edit', $data);
            $this->load->view('template/footer');
            $this->load->view('lenergies/lenergies_js');
        } else {
            $this->Lenergies_model->set_lenergies($id);
            redirect(base_url() . 'index.php/lenergies');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $lenergie_item = $this->Lenergies_model->get_lenergies($id);

        $this->Lenergies_model->delete_lenergies($id);
        redirect(base_url() . 'index.php/lenergies');
    }

    public function lenergies_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $lenergies = $this->Lenergies_model->get_lenergies2();
        $data = array();

        foreach ($lenergies->result() as $r) {
            $data[] = array(
                $r->idEnergie,
                $r->Druh_energie,
                $r->Jednotka,
                $r->Cena_za_jednotku);
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $lenergies->num_rows(),
            "recordsFiltered" => $lenergies->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }
}