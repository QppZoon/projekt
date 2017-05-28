<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Energies extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Energies_model');
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

    /*public function insert() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('Meno', 'Meno', 'required');
        $this->form_validation->set_rules('Priezvisko', 'Priezvisko', 'required');
        $this->form_validation->set_rules('Adresa', 'Adresa', 'required');
        $this->form_validation->set_rules('Dátum_narodenia', 'Dátum_narodenia', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/navigation');
            $this->load->view('users/insert');
            $this->load->view('template/footer');
        } else {
            $data = array(
                'Meno' => $this->input->post('Meno'),
                'Priezvisko' => $this->input->post('Priezvisko'),
                'Adresa' => $this->input->post('Adresa'),
                'Dátum_narodenia' => $this->input->post('Dátum_narodenia')
            );
            $this->Users_model->form_insert($data);
            $data['message'] = 'Data Inserted Successfully';
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('users/insert', $data);
            $this->load->view('template/footer');
        }
    }*/

    public function edit() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['energies_item'] = $this->Energies_model->get_energies($id);

        $data['title'] = 'Úprava vody';

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
                $r->Plyn_idPlyn,
                $r->Elektrina_idElektrina,
                $r->Voda_idVoda,
                $r->Prevádzka_idPrevádzka);
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