<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_barang_model extends CI_Model
{
    public function getStokBarang($id_entitas)
    {
        $query = "SELECT * FROM stok_barang WHERE id_user = $id_entitas";
        return $this->db->query($query)->result_array();
    }
    public function insertStokBarang($data)
    {
        $this->db->insert('stok_barang', $data);
        return $this->db->insert_id();
    }
}
