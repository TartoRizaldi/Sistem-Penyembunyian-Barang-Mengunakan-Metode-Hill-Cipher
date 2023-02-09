<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporanbarangkeluar_model extends CI_model 
{
    public function getAllBarangKeluar()
    {
        $query = "SELECT `barang_keluar`.`id_barangkeluar`, `barang`.`nama_barang`, `barang_keluar`.`tgl_keluar`, `barang_keluar`.`stok_keluar`, `barang_keluar`.`total` FROM `barang_keluar` INNER JOIN `barang` ON barang.`id_barang` = `barang_keluar`.`id_barang`";
        return $this->db->query($query)->result_array();
    }

    function getTahun()
    {
        $query = $this->db->query("SELECT YEAR(tgl_keluar) AS tahun FROM barang_keluar GROUP BY YEAR(tgl_keluar) ORDER BY YEAR(tgl_keluar) ASC");

        return $query->result();
    }
    
    function filterByTanggal($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * FROM barang_keluar WHERE tgl_keluar BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_keluar ASC");

        return $query->result();
    }

    function filterByBulan($tahun1, $bulanawal, $bulanakhir)
    {
        $query = $this->db->query("SELECT * FROM barang_keluar WHERE YEAR(tgl_keluar) = '$tahun1' and MONTH(tgl_keluar) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tgl_keluar ASC");

        return $query->result();
    }

    function filterByTahun($tahun2)
    {
        $query = $this->db->query("SELECT * FROM barang_keluar WHERE YEAR(tgl_keluar) = '$tahun2' ORDER BY tgl_keluar ASC");

        return $query->result();
    }
}
