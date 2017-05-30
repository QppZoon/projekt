<?php

class Owners_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_owners($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('Prevádzka_has_Majiteľ');
            return $query->result_array();
        }

        $query =  $this->db->get_where('Prevádzka_has_Majiteľ', array('Prevádzka_idPrevádzka' => $id));
        return $query->row_array();

    }

    public function get_owners2() {
        return $this->db->get('Prevádzka_has_Majiteľ');
    }

    public function  set_owners($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('Prevádzka_has_Majiteľ', $data);
        } else {
            $this->db->where('Prevádzka_idPrevádzka', $id);
            return $this->db->update('Prevádzka_has_Majiteľ', $data);
        }
    }

    public function delete_owners($id) {
        $this->db->where('Prevádzka_idPrevádzka', $id);
        return $this->db->delete('Prevádzka_has_Majiteľ');
    }
}
?>
