<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Electro extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Electro_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {

        $data['electro'] = $this->Electro_model->get_electro();
        $data['title'] = 'elektrina';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('electro/index', $data);
        $this->load->view('template/footer');
        $this->load->view('electro/electro_js');
    }

    public function view($id = NULL) {
        $data['electro_item'] = $this->Electro_model->get_electro($id);

        if (empty($data['electro_item'])) {
            show_404();
        }

        $data['title'] = 'Detail elektriny';
        $data['electro'] = $data['electro_item']['idElektrina'];

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('electro/view', $data);
        $this->load->view('template/footer');
        $this->load->view('electro/electro_js');
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

        $data['electro_item'] = $this->Electro_model->get_electro($id);

        $data['title'] = 'Úprava elektriny';
        $data['electro'] = $data['electro_item']['idElektrina'];

        $this->form_validation->set_rules('idElektrina', 'ID Elektriny', 'required');
        $this->form_validation->set_rules('Cena_za_jednotku', 'Cena za jednotku', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('electro/edit', $data);
            $this->load->view('template/footer');
            $this->load->view('electro/electro_js');
        } else {
            $this->Electro_model->set_electro($id);
            redirect(base_url() . 'index.php/electro');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $electro_item = $this->Electro_model->get_electro($id);

        $this->Electro_model->delete_electro($id);
        redirect(base_url() . 'index.php/electro');
    }

    public function rents_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $electro = $this->Electro_model->get_electro2();
        $data = array();

        foreach ($electro->result() as $r) {
            $data[] = array(
                $r->idElektrina,
                $r->Cena_za_jednotku);
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $electro->num_rows(),
            "recordsFiltered" => $electro->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }
}