<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $data['meno'] = "Karol";
        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('home',$data);
        $this->load->view('template/footer');
    }
}
