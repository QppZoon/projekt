<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Water extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Water_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {

        $data['water'] = $this->Water_model->get_water();
        $data['title'] = 'voda';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('water/index', $data);
        $this->load->view('template/footer');
        $this->load->view('water/water_js');
    }

    public function view($id = NULL) {
        $data['water_item'] = $this->Water_model->get_water($id);

        if (empty($data['water_item'])) {
            show_404();
        }

        $data['title'] = 'Detail vody';
        $data['water'] = $data['water_item']['idVoda'];

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('water/view', $data);
        $this->load->view('template/footer');
        $this->load->view('water/water_js');
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

        $data['water_item'] = $this->Water_model->get_water($id);

        $data['title'] = 'Úprava vody';
        $data['water'] = $data['water_item']['idVoda'];

        $this->form_validation->set_rules('idVoda', 'ID Vody', 'required');
        $this->form_validation->set_rules('Cena_za_jednotku', 'Cena za jednotku', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('water/edit', $data);
            $this->load->view('template/footer');
            $this->load->view('water/water_js');
        } else {
            $this->Water_model->set_water($id);
            redirect(base_url() . 'index.php/water');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $water_item = $this->Water_model->get_water($id);

        $this->Water_model->delete_water($id);
        redirect(base_url() . 'index.php/water');
    }

    public function rents_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $water = $this->Water_model->get_water2();
        $data = array();

        foreach ($water->result() as $r) {
            $data[] = array(
                $r->idVoda,
                $r->Cena_za_jednotku);
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $water->num_rows(),
            "recordsFiltered" => $water->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }
}