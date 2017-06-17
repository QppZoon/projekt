<?php

class Months_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_months($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('Mesiac');
            return $query->result_array();
        }

        $query =  $this->db->get_where('Mesiac', array('idMesiac' => $id));
        return $query->row_array();

    }

    public function get_months2() {
        return $this->db->get('Mesiac');
    }

    public function  set_months($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('Mesiac', $data);
        } else {
            $this->db->where('idMesiac', $id);
            return $this->db->update('Mesiac', $data);
        }
    }

    public function delete_months($id) {
        $this->db->where('idMesiac', $id);
        return $this->db->delete('Mesiac');
    }
}
?>
