<?php

class Electro_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_electro($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('Elektrina');
            return $query->result_array();
        }

        $query =  $this->db->get_where('Elektrina', array('idElektrina' => $id));
        return $query->row_array();

    }

    public function get_electro2() {
        return $this->db->get('Elektrina');
    }

    public function  set_electro($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('Elektrina', $data);
        } else {
            $this->db->where('idElektrina', $id);
            return $this->db->update('Elektrina', $data);
        }
    }

    public function delete_electro($id) {
        $this->db->where('idElektrina', $id);
        return $this->db->delete('Elektrina');
    }
}
?>
