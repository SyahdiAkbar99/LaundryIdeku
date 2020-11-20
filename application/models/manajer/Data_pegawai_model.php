<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pegawai_model extends CI_Model
{
  public function getDataPegawai($id_entitas)
  {
    $query = "SELECT COUNT(absensi_pegawai.presensi) AS kehadiran, tanggal_hadir, nama_pegawai, tanggal_keluar, status_aktif,id_absen,active
        FROM absensi_pegawai
          WHERE
            absensi_pegawai.presensi = 1 AND absensi_pegawai.active = 1 AND absensi_pegawai.id_user = $id_entitas
              
              GROUP BY (absensi_pegawai.nama_pegawai)
              HAVING COUNT(absensi_pegawai.presensi)
              ORDER BY absensi_pegawai.tanggal_hadir ASC";

    $getTotalPresensi = $this->db->query($query)->result_array();

    return $getTotalPresensi;
  }
}
