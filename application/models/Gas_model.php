<?php

class Gas_model extends  CI_Model {

    function __construct()

    {
        $this->load->database();
    }

    function get_gas($id = FALSE)
    {

        if ($id === FALSE)
        {
            $query = $this->db->get('Plyn');
            return $query->result_array();
        }

        $query =  $this->db->get_where('Plyn', array('idPlyn' => $id));
        return $query->row_array();

    }

    public function get_gas2() {
        return $this->db->get('Plyn');
    }

    public function  set_gas($id = 0) {
        $this->load->helper('url');

        foreach ($_POST as $key => $value) {
            if ($key != 'submit')
                $data[$key] = $value;
        }

        if ($id == 0) {
            return $this->db->insert('Plyn', $data);
        } else {
            $this->db->where('idPlyn', $id);
            return $this->db->update('Plyn', $data);
        }
    }

    public function delete_gas($id) {
        $this->db->where('idPlyn', $id);
        return $this->db->delete('Plyn');
    }
}
?>
