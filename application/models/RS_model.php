<?php

class RS_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_rs($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('Prevádzka_has_Nájom');
            return $query->result_array();
        }

        $query =  $this->db->get_where('Prevádzka_has_Nájom', array('idPrevádzka_has_Nájom' => $id));
        return $query->row_array();

    }

    public function get_rs2() {
        return $this->db->get('Prevádzka_has_Nájom');
    }

    public function  set_rs($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('Prevádzka_has_Nájom', $data);
        } else {
            $this->db->where('idPrevádzka_has_Nájom', $id);
            return $this->db->update('Prevádzka_has_Nájom', $data);
        }
    }

    public function delete_rs($id) {
        $this->db->where('idPrevádzka_has_Nájom', $id);
        return $this->db->delete('Prevádzka_has_Nájom');
    }
}
?>
