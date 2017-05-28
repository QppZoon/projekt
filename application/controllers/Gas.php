<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gas extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gas_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {

        $data['gas'] = $this->Gas_model->get_gas();
        $data['title'] = 'plyn';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('gas/index', $data);
        $this->load->view('template/footer');
        $this->load->view('gas/gas_js');
    }

    public function view($id = NULL) {
        $data['gas_item'] = $this->Gas_model->get_gas($id);

        if (empty($data['gas_item'])) {
            show_404();
        }

        $data['title'] = 'Detail plynu';
        $data['gas'] = $data['gas_item']['idPlyn'];

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('gas/view', $data);
        $this->load->view('template/footer');
        $this->load->view('gas/gas_js');
    }

    public function insert() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Pridanie plynu';

        $this->form_validation->set_rules('Cena_za_jednotku', 'Cena za jednotku', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('gas/insert');
            $this->load->view('template/footer');
            $this->load->view('gas/gas_js');
        } else {
            $this->Gas_model->set_gas();
            redirect(base_url() . 'index.php/gas');
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['gas_item'] = $this->Gas_model->get_gas($id);

        $data['title'] = 'Úprava plynu';
        $data['gas'] = $data['gas_item']['idPlyn'];

        $this->form_validation->set_rules('idPlyn', 'ID Plynu', 'required');
        $this->form_validation->set_rules('Cena_za_jednotku', 'Cena za jednotku', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('gas/edit', $data);
            $this->load->view('template/footer');
            $this->load->view('gas/gas_js');
        } else {
            $this->Gas_model->set_gas($id);
            redirect(base_url() . 'index.php/gas');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $gas_item = $this->Gas_model->get_gas($id);

        $this->Gas_model->delete_gas($id);
        redirect(base_url() . 'index.php/gas');
    }

    public function rents_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $gas = $this->Gas_model->get_gas2();
        $data = array();

        foreach ($gas->result() as $r) {
            $data[] = array(
                $r->idPlyn,
                $r->Cena_za_jednotku);
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $gas->num_rows(),
            "recordsFiltered" => $gas->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }
}