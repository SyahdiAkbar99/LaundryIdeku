<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_pemesanan_model extends CI_Model
{
    public function getHistoryOrder($id_entitas)
    {
        $query = "SELECT * FROM data_pemesanan WHERE id_user = $id_entitas";
        return $this->db->query($query)->result_array();
    }
}
