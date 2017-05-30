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
            $query = $this->db->get('Majiteľ');
            return $query->result_array();
        }

        $query =  $this->db->get_where('Majiteľ', array('idMajiteľ' => $id));
        return $query->row_array();

    }

    public function get_users2() {
        return $this->db->get('Majiteľ');
    }

    public function  set_users($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('Majiteľ', $data);
        } else {
            $this->db->where('idMajiteľ', $id);
            return $this->db->update('Majiteľ', $data);
        }
    }

    public function delete_users($id) {
        $this->db->where('idMajiteľ', $id);
        return $this->db->delete('Majiteľ');
    }
}
?>
