<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Omzet_data_model extends CI_Model
{
  public function getOmzetMonthly($id_entitas)
  {
    $query = "SELECT SUM(data_pemesanan.total_pemesanan) AS pendapatan_bulanan, DATE_FORMAT(data_pemesanan.tanggal_pemesanan, '%M %Y') AS bulan, active,id_user
        FROM data_pemesanan
          WHERE
            data_pemesanan.active = 1 AND data_pemesanan.id_user = $id_entitas
              
              GROUP BY MONTH(data_pemesanan.tanggal_pemesanan)
              HAVING SUM(data_pemesanan.total_pemesanan)
              ORDER BY data_pemesanan.tanggal_pemesanan ASC";

    $omzetPerMonth = $this->db->query($query)->result_array();

    return $omzetPerMonth;
  }
  public function getOrderMonthly($id_entitas)
  {
    $query = "SELECT COUNT(data_pemesanan.nama_customer) AS pelanggan, DATE_FORMAT(data_pemesanan.tanggal_pemesanan, '%M %Y') AS bulan, active
        FROM data_pemesanan
          WHERE
            data_pemesanan.active = 1 AND data_pemesanan.id_user = $id_entitas
              
              GROUP BY MONTH(data_pemesanan.tanggal_pemesanan)
              HAVING COUNT(data_pemesanan.nama_customer)
              ORDER BY data_pemesanan.tanggal_pemesanan ASC";

    $getOrderPerMonth = $this->db->query($query)->result_array();

    return $getOrderPerMonth;
  }
  public function getUnomzetMonthly($id_entitas)
  {
    $query = "SELECT SUM(ongkos.total_ongkos) AS pengeluaran_bulanan, DATE_FORMAT(ongkos.tanggal_ongkos, '%M %Y') AS bulan, active
        FROM ongkos
          WHERE
            ongkos.active = 1 AND ongkos.id_user = $id_entitas
              
              GROUP BY MONTH(ongkos.tanggal_ongkos)
              HAVING SUM(ongkos.total_ongkos)
              ORDER BY ongkos.tanggal_ongkos ASC";

    $getUnomzetMonthly = $this->db->query($query)->result_array();

    return $getUnomzetMonthly;
  }
  public function getOmzetThisMonth($id_entitas)
  {
    $query = "SELECT data_pemesanan.id_pemesanan , SUM(data_pemesanan.total_pemesanan) AS pendapatan_bulan_ini, MONTH(data_pemesanan.tanggal_pemesanan) bulan, DATE_FORMAT(CURRENT_DATE, '%M %Y') this_month, active
        FROM data_pemesanan
          WHERE
          data_pemesanan.active = 1 AND data_pemesanan.id_user = $id_entitas AND
              MONTH(data_pemesanan.tanggal_pemesanan) = MONTH(CURRENT_DATE)
              GROUP BY MONTH(data_pemesanan.tanggal_pemesanan)
              HAVING SUM(data_pemesanan.total_pemesanan) 
              LIMIT 12";

    $this_omzet = $this->db->query($query)->row_array();

    return $this_omzet;
  }
  public function getClearOmzet($id_entitas)
  {
    $query1 = "SELECT SUM(data_pemesanan.total_pemesanan) AS omzet, sqrt(COUNT(data_pemesanan.nama_customer)) AS jum, SUM(ongkos.total_ongkos) AS unomzet, DATE_FORMAT(data_pemesanan.tanggal_pemesanan, '%M %Y') AS bulan, data_pemesanan.active
        FROM data_pemesanan INNER JOIN ongkos ON data_pemesanan.active = ongkos.active
          WHERE
            data_pemesanan.active = 1 AND data_pemesanan.id_user = $id_entitas
              GROUP BY MONTH(data_pemesanan.tanggal_pemesanan)
              HAVING SUM(data_pemesanan.total_pemesanan)
              ORDER BY data_pemesanan.tanggal_pemesanan ASC";

    $getClearOmzetMonthly = $this->db->query($query1)->result_array();

    return $getClearOmzetMonthly;
  }
}
