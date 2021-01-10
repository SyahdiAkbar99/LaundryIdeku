<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pegawai_model extends CI_Model
{
  public function getDataPegawai($id_entitas)
  {
    $query = "SELECT * FROM user WHERE role_id = 1";
    return $this->db->query($query)->result_array();
  }
}
