<?php

class Stores_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_stores($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('prevádzka');
            return $query->result_array();
        }

        $query =  $this->db->get_where('prevádzka', array('idPrevádzka' => $id));
        return $query->row_array();

    }

    /*function form_insert($data){
        $this->db->insert('majiteľ', $data);
    }*/

    public function get_stores2() {
        return $this->db->get('prevádzka');
    }

    public function  set_stores($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('prevádzka', $data);
        } else {
            $this->db->where('idPrevádzka', $id);
            return $this->db->update('prevádzka', $data);
        }
    }

    public function delete_stores($id) {
        $this->db->where('idPrevádzka', $id);
        return $this->db->delete('prevádzka');
    }
}
?>
