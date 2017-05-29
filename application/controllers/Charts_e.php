<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts_e extends CI_Controller {

    function __Construct() {
        parent::__Construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('Charts_e_model');

    }
    /**
     * @desc: This method is used to load view
     */
    public function index()
    {

        $this->load->view('template/header');
        $this->load->view('template/navigation');
        $this->load->view('template/footer');
        $this->load->view('charts_e/index');
    }
    /**
     * @desc: This method is used to get data to call model and print it into Json
     * This method called by Ajax
     */
    function get_stores(){
        $data  = $this->Charts_e_model->get_stores();
        print_r(json_encode($data, true));
    }
}