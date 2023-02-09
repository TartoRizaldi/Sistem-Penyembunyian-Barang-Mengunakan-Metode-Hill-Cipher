<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporanbarang_model extends CI_model 
{
    public function getAllBarang()
    {
        $query = "SELECT barang.`id_barang`, barang.`nama_barang`, satuan.`nama_satuan`, barang.`stok`, barang.`harga`, supplier.`nama_supplier`, user.`id`
        FROM barang
        INNER JOIN satuan ON satuan.`id_satuan` = barang.`id_satuan`
        INNER JOIN supplier ON supplier.`id_supplier` = barang.`id_supplier`
        INNER JOIN user on user.`id` = barang.`id`
        ";
        return $this->db->query($query)->result_array();
    }
}
