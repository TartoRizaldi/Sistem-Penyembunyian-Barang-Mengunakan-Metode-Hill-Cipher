<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    // public function totalGuru()
    // {
    //     $query = $this->db->get('guru')->num_rows();
    //     return $query;
    // }

    public function totalRowsBarang()
    {
        return $this->db->get('barang')->num_rows();
    }

    public function totalRowsSupplier()
    {
        return $this->db->get('supplier')->num_rows();
    }

    public function totalRowsBarMasuk()
    {
        return $this->db->get('barang_masuk')->num_rows();
    }
    public function totalRowsBarKeluar()
    {
        return $this->db->get('barang_keluar')->num_rows();
    }
}