<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_laundry_model extends CI_Model
{
  public function getCleanIncome($id_entitas)
  {
    $query = "SELECT SUM(data_pemesanan.total_pemesanan) AS omzet, sqrt(COUNT(data_pemesanan.nama_customer)) AS jum, SUM(ongkos.total_ongkos) AS unomzet, DATE_FORMAT(data_pemesanan.tanggal_pemesanan, '%M %Y') AS bulan, data_pemesanan.active
      FROM data_pemesanan INNER JOIN ongkos ON data_pemesanan.active = ongkos.active
        WHERE
          data_pemesanan.active = 1 AND data_pemesanan.id_user = $id_entitas
            GROUP BY MONTH(data_pemesanan.tanggal_pemesanan)
            HAVING SUM(data_pemesanan.total_pemesanan)
            ORDER BY data_pemesanan.tanggal_pemesanan ASC";

    $getIncome = $this->db->query($query)->result_array();
    return $getIncome;
  }
  public function getBurden($id_entitas)
  {
    $query = "SELECT SUM(ongkos.total_harga_barang + ongkos.total_gaji_pegawai) AS beban, DATE_FORMAT(ongkos.tanggal_ongkos, '%M %Y') AS bulan, active
        FROM ongkos
          WHERE
            ongkos.active = 1 AND ongkos.id_user = $id_entitas
              GROUP BY MONTH(ongkos.tanggal_ongkos)
              ORDER BY ongkos.tanggal_ongkos ASC";

    $getUnomzetMonthly = $this->db->query($query)->result_array();

    return $getUnomzetMonthly;
  }
  public function getProfiAndLoss($id_entitas)
  {
    $query = "SELECT SUM(data_pemesanan.total_pemesanan) AS omzet, sqrt(COUNT(data_pemesanan.total_pemesanan)) AS jum, SUM(ongkos.total_harga_barang + total_gaji_pegawai) AS profitloss, DATE_FORMAT(data_pemesanan.tanggal_pemesanan, '%M %Y') AS bulan, data_pemesanan.active, ongkos.active
        FROM data_pemesanan JOIN ongkos ON data_pemesanan.active = ongkos.active
          WHERE
            data_pemesanan.active = 1 AND ongkos.active = 1 AND data_pemesanan.id_user = $id_entitas AND ongkos.id_user = $id_entitas
              GROUP BY MONTH(data_pemesanan.tanggal_pemesanan)
              ORDER BY data_pemesanan.tanggal_pemesanan ASC";

    $getCleanIncome = $this->db->query($query)->result_array();

    return $getCleanIncome;
  }
}
