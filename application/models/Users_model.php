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

    public function  set_users($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('majiteľ', $data);
        } else {
            $this->db->where('idMajiteľ', $id);
            return $this->db->update('majiteľ', $data);
        }
    }

    public function delete_users($id) {
        $this->db->where('idMajiteľ', $id);
        return $this->db->delete('majiteľ');
    }
}
?>
