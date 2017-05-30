<?php

class Stores_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_stores($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('Prevádzka');
            return $query->result_array();
        }

        $query =  $this->db->get_where('Prevádzka', array('idPrevádzka' => $id));
        return $query->row_array();

    }

    public function get_stores2() {
        return $this->db->get('Prevádzka');
    }

    public function  set_stores($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('Prevádzka', $data);
        } else {
            $this->db->where('idPrevádzka', $id);
            return $this->db->update('Prevádzka', $data);
        }
    }

    public function delete_stores($id) {
        $this->db->where('idPrevádzka', $id);
        return $this->db->delete('Prevádzka');
    }
}
?>
