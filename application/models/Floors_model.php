<?php

class Floors_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_floors($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('Poschodie');
            return $query->result_array();
        }

        $query =  $this->db->get_where('Poschodie', array('idPoschodie' => $id));
        return $query->row_array();

    }

    public function get_floors2() {
        return $this->db->get('Poschodie');
    }

    public function  set_floors($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('Poschodie', $data);
        } else {
            $this->db->where('idPoschodie', $id);
            return $this->db->update('Poschodie', $data);
        }
    }

    public function delete_floors($id) {
        $this->db->where('idPoschodie', $id);
        return $this->db->delete('Poschodie');
    }
}
?>
