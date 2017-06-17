<?php

class Lenergies_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_lenergies($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('Energie');
            return $query->result_array();
        }

        $query =  $this->db->get_where('Energie', array('idEnergie' => $id));
        return $query->row_array();

    }

    public function get_lenergies2() {
        return $this->db->get('Energie');
    }

    public function  set_lenergies($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('Energie', $data);
        } else {
            $this->db->where('idEnergie', $id);
            return $this->db->update('Energie', $data);
        }
    }

    public function delete_lenergies($id) {
        $this->db->where('idEnergie', $id);
        return $this->db->delete('Energie');
    }
}
?>
