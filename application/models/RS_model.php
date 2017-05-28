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
            $query = $this->db->get('prevádzka_has_nájom');
            return $query->result_array();
        }

        $query =  $this->db->get_where('prevádzka_has_nájom', array('idPrevádzka_has_Nájom' => $id));
        return $query->row_array();

    }

    /*function form_insert($data){
        $this->db->insert('majiteľ', $data);
    }*/

    public function get_rs2() {
        return $this->db->get('prevádzka_has_nájom');
    }

    public function  set_rs($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('prevádzka_has_nájom', $data);
        } else {
            $this->db->where('idPrevádzka_has_Nájom', $id);
            return $this->db->update('prevádzka_has_nájom', $data);
        }
    }

    public function delete_rs($id) {
        $this->db->where('idPrevádzka_has_Nájom', $id);
        return $this->db->delete('prevádzka_has_nájom');
    }
}
?>
