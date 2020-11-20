<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pemesanan_model extends CI_Model
{
    public function getDataPemesanan($id_entitas)
    {
        $query = "SELECT * FROM data_pemesanan WHERE id_user = $id_entitas";
        return $this->db->query($query)->result_array();
    }
    public function insertDataPemesanan($data)
    {
        $this->db->insert('data_pemesanan', $data);
        return $this->db->insert_id();
    }
    function editDataPemesanan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    function updateDataPemesanan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
