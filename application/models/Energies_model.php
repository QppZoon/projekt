<?php

class Energies_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_energies($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('Prevádzka_has_Energie');
            return $query->result_array();
        }

        $query =  $this->db->get_where('Prevádzka_has_Energie', array('Prevázka_idPrevázka' => $id));
        return $query->row_array();

    }

    public function get_energies2() {
        return $this->db->get('Prevádzka_has_Energie');
    }

    public function  set_energies($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('Prevádzka_has_Energie', $data);
        } else {
            $this->db->where('Prevázka_idPrevázka', $id);
            return $this->db->update('Prevádzka_has_Energie', $data);
        }
    }

    public function delete_energies($id) {
        $this->db->where('Prevázka_idPrevázka', $id);
        return $this->db->delete('Prevádzka_has_Energie');
    }
}
?>
