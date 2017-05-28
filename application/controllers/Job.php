<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Job extends CI_Controller {

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('job');
        $this->load->view('template/footer');
        $this->load->view('template/footer2');
    }
}