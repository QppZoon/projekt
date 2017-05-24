<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('users/index');
        $this->load->view('template/footer');
    }
}