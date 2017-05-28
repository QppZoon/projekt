<?php

class Rents_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_rents($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('nájom');
            return $query->result_array();
        }

        $query =  $this->db->get_where('nájom', array('idNájom' => $id));
        return $query->row_array();

    }

    public function get_rents2() {
        return $this->db->get('nájom');
    }

    public function  set_rents($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('nájom', $data);
        } else {
            $this->db->where('idNájom', $id);
            return $this->db->update('nájom', $data);
        }
    }

    public function delete_rents($id) {
        $this->db->where('idNájom', $id);
        return $this->db->delete('nájom');
    }
}
?>
