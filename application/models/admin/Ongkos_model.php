<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ongkos_model extends CI_Model
{
    public function getOngkos($id_entitas)
    {
        $query = "SELECT * FROM ongkos WHERE id_user = $id_entitas";
        return $this->db->query($query)->result_array();
    }
    public function insertOngkos($data)
    {
        $this->db->insert('ongkos', $data);
        return $this->db->insert_id();
    }
    public function updateOngkos($data, $id)
    {
        $this->db->where('id_ongkos', $id);
        $this->db->update('ongkos', $data);
    }
}
