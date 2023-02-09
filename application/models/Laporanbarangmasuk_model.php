<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporanbarangmasuk_model extends CI_model 
{
    public function getAllBarangMasuk()
    {
        $query = "SELECT `barang_masuk`.`id_barangmasuk`, `barang`.`nama_barang`, `barang_masuk`.`tgl_masuk`, `barang_masuk`.`stok_masuk`, `barang_masuk`.`total` FROM `barang_masuk` INNER JOIN `barang` ON barang.`id_barang` = `barang_masuk`.`id_barang`";
        return $this->db->query($query)->result_array();
    }

    function getTahun()
    {
        $query = $this->db->query("SELECT YEAR(tgl_masuk) AS tahun FROM barang_masuk GROUP BY YEAR(tgl_masuk) ORDER BY YEAR(tgl_masuk) ASC");

        return $query->result();
    }
    
    function filterByTanggal($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT `barang_masuk`.`id_barangmasuk`, `barang`.`nama_barang`, `barang_masuk`.`tgl_masuk`, `barang_masuk`.`stok_masuk`, `barang_masuk`.`total` FROM `barang_masuk` INNER JOIN `barang` ON barang.`id_barang` = `barang_masuk`.`id_barang` WHERE tgl_masuk BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_masuk ASC");

        return $query->result();
    }

    function filterByBulan($tahun1, $bulanawal, $bulanakhir)
    {
        $query = $this->db->query("SELECT `barang_masuk`.`id_barangmasuk`, `barang`.`nama_barang`, `barang_masuk`.`tgl_masuk`, `barang_masuk`.`stok_masuk`, `barang_masuk`.`total` FROM `barang_masuk` INNER JOIN `barang` ON barang.`id_barang` = `barang_masuk`.`id_barang` WHERE YEAR(tgl_masuk) = '$tahun1' and MONTH(tgl_masuk) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tgl_masuk ASC");

        return $query->result();
    }

    function filterByTahun($tahun2)
    {
        $query = $this->db->query("SELECT `barang_masuk`.`id_barangmasuk`, `barang`.`nama_barang`, `barang_masuk`.`tgl_masuk`, `barang_masuk`.`stok_masuk`, `barang_masuk`.`total` FROM `barang_masuk` INNER JOIN `barang` ON barang.`id_barang` = `barang_masuk`.`id_barang` WHERE YEAR(tgl_masuk) = '$tahun2' ORDER BY tgl_masuk ASC");

        return $query->result();
    }
}
