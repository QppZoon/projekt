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
            $query = $this->db->get('voda');
            return $query->result_array();
        }

        $query =  $this->db->get_where('voda', array('idVoda' => $id));
        return $query->row_array();

    }

    public function get_water2() {
        return $this->db->get('voda');
    }

    public function  set_water($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('voda', $data);
        } else {
            $this->db->where('idVoda', $id);
            return $this->db->update('voda', $data);
        }
    }

    public function delete_water($id) {
        $this->db->where('idVoda', $id);
        return $this->db->delete('voda');
    }
}
?>
