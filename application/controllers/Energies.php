<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Energies extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Energies_model');
        $this->load->model('Stores_model');
        $this->load->model('Electro_model');
        $this->load->model('Gas_model');
        $this->load->model('Water_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {

        $data['energies'] = $this->Energies_model->get_energies();
        $data['title'] = 'prevádzka_has_energie';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('energies/index', $data);
        $this->load->view('template/footer');
        $this->load->view('energies/energies_js');
    }

    public function view($id = NULL) {
        $data['energies_item'] = $this->Energies_model->get_energies($id);

        if (empty($data['energies_item'])) {
            show_404();
        }

        $data['title'] = 'Detail Energií';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('energies/view', $data);
        $this->load->view('template/footer');
        $this->load->view('energies/energies_js');
    }

    public function insert() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['store_item'] = $this->Stores_model->get_stores();
        $data['electro_item'] = $this->Electro_model->get_electro();
        $data['gas_item'] = $this->Gas_model->get_gas();
        $data['water_item'] = $this->Water_model->get_water();

        $data['title'] = 'Pridanie energií';

        $this->form_validation->set_rules('Plyn_idPlyn', 'ID Plynu', 'required');
        $this->form_validation->set_rules('Elektrina_idElektrina', 'ID Elektriny', 'required');
        $this->form_validation->set_rules('Voda_idVoda', 'ID Vody', 'required');
        $this->form_validation->set_rules('Prevádzka_idPrevádzka', 'ID Prevádzky', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('energies/insert');
            $this->load->view('template/footer');
            $this->load->view('energies/energies_js');
        } else {
            $this->Energies_model->set_energies();
            redirect(base_url() . 'index.php/energies');
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['energies_item'] = $this->Energies_model->get_energies($id);

        $data['title'] = 'Úprava energií';

        $this->form_validation->set_rules('Plyn_idPlyn', 'ID Plynu', 'required');
        $this->form_validation->set_rules('Elektrina_idElektrina', 'ID Elektriny', 'required');
        $this->form_validation->set_rules('Voda_idVoda', 'ID Vody', 'required');
        $this->form_validation->set_rules('Prevádzka_idPrevádzka', 'ID Prevádzky', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('energies/edit', $data);
            $this->load->view('template/footer');
            $this->load->view('energies/energies_js');
        } else {
            $this->Energies_model->set_energies($id);
            redirect(base_url() . 'index.php/energies');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $energies_item = $this->Energies_model->get_energies($id);

        $this->Energies_model->delete_energies($id);
        redirect(base_url() . 'index.php/energies');
    }

    public function rents_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $energies = $this->Energies_model->get_energies2();
        $data = array();

        foreach ($energies->result() as $r) {
            $data[] = array(
                $r->idPlyn,
                $r->idElektrina,
                $r->idVoda,
                $r->idPrevádzka);
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $energies->num_rows(),
            "recordsFiltered" => $energies->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }
}