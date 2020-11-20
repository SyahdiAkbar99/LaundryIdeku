<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gaji_pegawai_model extends CI_Model
{
    public function getSalaryEmploye($id_entitas)
    {
        $query = "SELECT * FROM gaji_pegawai WHERE id_user = $id_entitas";
        return $this->db->query($query)->result_array();
    }
    public function insertSalaryEmploye($data)
    {
        $this->db->insert('gaji_pegawai', $data);
        return $this->db->insert_id();
    }
}
