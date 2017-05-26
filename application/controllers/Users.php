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

public function index()
{

    $data['user'] = $this->Users_model->get_users();
    $data['title'] = 'majiteľ';

    $this->load->view('template/header', $data);
    $this->load->view('template/navigation');
    $this->load->view('users/index', $data);

}

    public function users_page() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $users = $this->USers_model->get_users2();
        $data = array();

        foreach ($users->result() as $r) {
            $data[] = array($r->idMajiteľ,
                $r->Meno,
                $r->Priezvisko,
                $r->Adresa,
                $r->Dátum_narodenia);
        }

        $output = array("draw" => $draw,
            "recordsTotal" => $users->num_rows(),
            "recordsFiltered" => $users->num_rows(),
            "data" => $data);
        echo json_encode($output);
        exit();
    }
}