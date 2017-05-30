<?php

class Water_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_water($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('Voda');
            return $query->result_array();
        }

        $query =  $this->db->get_where('Voda', array('idVoda' => $id));
        return $query->row_array();

    }

    public function get_water2() {
        return $this->db->get('Voda');
    }

    public function  set_water($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('Voda', $data);
        } else {
            $this->db->where('idVoda', $id);
            return $this->db->update('Voda', $data);
        }
    }

    public function delete_water($id) {
        $this->db->where('idVoda', $id);
        return $this->db->delete('Voda');
    }
}
?>
