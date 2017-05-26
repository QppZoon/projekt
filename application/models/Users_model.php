<?php

class Users_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_users($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('majiteľ');
            return $query->result_array();
        }

        $query =  $this->db->get_where('majiteľ', array('idMajiteľ' => $id));
        return $query->row_array();

    }

    public function get_users2() {
        return $this->db->get('majiteľ');
    }
}
?>
