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
            $query = $this->db->get('prevádzka_has_energie');
            return $query->result_array();
        }

        $query =  $this->db->get_where('prevádzka_has_energie', array('Prevádzka_idPrevádzka' => $id));
        return $query->row_array();

    }

    /*function form_insert($data){
        $this->db->insert('majiteľ', $data);
    }*/

    public function get_energies2() {
        return $this->db->get('prevádzka_has_energie');
    }

    public function  set_energies($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('prevádzka_has_energie', $data);
        } else {
            $this->db->where('Prevádzka_idPrevádzka', $id);
            return $this->db->update('prevádzka_has_energie', $data);
        }
    }

    public function delete_energies($id) {
        $this->db->where('Prevádzka_idPrevádzka', $id);
        return $this->db->delete('prevádzka_has_energie');
    }
}
?>
