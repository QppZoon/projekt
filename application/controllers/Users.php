<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
    public function __construct() {
        Parent::__construct();
        $this->load->model("Users_model");
    }
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('users/index', array());
        $this->load->view('template/footer');
    }
    public function users_page()
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $users = $this->Users_model->get_users();
        $data = array();
        foreach($users->result() as $r) {
            $data[] = array(
                $r->id,
                $r->firstname,
                $r->lastname,
                $r->email
            );
        }
        //   print_r($data);
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $users->num_rows(),
            "recordsFiltered" => $users->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }
}