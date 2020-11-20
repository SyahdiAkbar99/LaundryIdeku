<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_pegawai_model extends CI_Model
{
    public function getAbsensiPegawai($id_entitas)
    {
        $query = "SELECT * FROM absensi_pegawai WHERE id_user = $id_entitas";
        return $this->db->query($query)->result_array();
    }
    public function insertAbsensiPegawai($data)
    {
        $this->db->insert('absensi_pegawai', $data);
        return $this->db->insert_id();
    }
}
