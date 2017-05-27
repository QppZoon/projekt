<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
public function __construct()
{
    parent::__construct();
    $this->load->model('Users_model');
    $this->load->helper('url_helper');
    $this->load->database();
    $this->load->library('session');
}

    public function index() {

        $data['user'] = $this->Users_model->get_users();
        $data['title'] = 'majiteľ';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('users/index', $data);
        $this->load->view('template/footer');
        $this->load->view('users/users_js');
    }

    public function view($id = NULL) {
        $data['user_item'] = $this->Users_model->get_users($id);

        if (empty($data['user_item'])) {
            show_404();
        }

        $data['title'] = 'Detail majiteľa';
        $data['meno'] = $data['user_item']['Meno'];
        $data['priezvisko'] = $data['user_item']['Priezvisko'];

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('users/view', $data);
        $this->load->view('template/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['user_item'] = $this->Users_model->get_users();

        $data['title'] = 'Pridanie majiteľa';

        $this->form_validation->set_rules('idMajiteľ', 'ID Majiteľa', 'required');
        $this->form_validation->set_rules('Meno', 'Meno', 'required');
        $this->form_validation->set_rules('Priezvisko', 'Priezvisko', 'required');
        $this->form_validation->set_rules('Adresa', 'Adresa', 'required');
        $this->form_validation->set_rules('Dátum_narodenia', 'Dátum narodenia', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('users/create', $data);
            $this->load->view('template/footer');
        } else {
            $this->Users_model->set_users();
            //$this->load->view('news/success');
            redirect(base_url() . 'index.php/users');
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['user_item'] = $this->Users_model->get_users($id);

        $data['title'] = 'Úprava majiteľa';
        $data['meno'] = $data['user_item']['Meno'];
        $data['priezvisko'] = $data['user_item']['Priezvisko'];

        $this->form_validation->set_rules('idMajiteľ', 'ID Majiteľa', 'required');
        $this->form_validation->set_rules('Meno', 'Meno', 'required');
        $this->form_validation->set_rules('Priezvisko', 'Priezvisko', 'required');
        $this->form_validation->set_rules('Adresa', 'Adresa', 'required');
        $this->form_validation->set_rules('Dátum_narodenia', 'Dátum narodenia', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('users/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->Users_model->set_users($id);
            //$this->load->view('news/success');
            redirect(base_url() . 'index.php/users');
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $user_item = $this->Users_model->get_users($id);

        $this->Users_model->delete_users($id);
        redirect(base_url() . 'index.php/users');
    }

    public function users_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $users = $this->Users_model->get_users2();
        $data = array();

        foreach ($users->result() as $r) {
            $data[] = array(
                $r->idMajiteľ,
                $r->Meno,
                $r->Priezvisko,
                $r->Adresa,
                $r->Dátum_narodenia);
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $users->num_rows(),
            "recordsFiltered" => $users->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }
}