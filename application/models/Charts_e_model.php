<?php

class Charts_e_model extends  CI_Model {

    function __construct()

    {
        parent::__Construct();
        $this->load->database('default', TRUE, TRUE);
    }

    public function get_stores() {
        $this->db->select('*');
        $query = $this->db->get('prevádzka');
        return $query->result_array();
    }
}
?>
