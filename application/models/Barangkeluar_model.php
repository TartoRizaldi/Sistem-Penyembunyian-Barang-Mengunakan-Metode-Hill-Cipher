<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar_model extends CI_model 
{

    public function getAllBarangKeluar()
    {
        // $query = "SELECT `barang_keluar`.`id_barangkeluar`, `barang`.`nama_barang`, `barang_keluar`.`tgl_keluar`, `barang_keluar`.`stok_keluar`, `barang_keluar`.`total`
        // FROM `barang_keluar`
        // INNER JOIN `barang` ON `barang`.`id_barang` = `barang_keluar`.`id_barang`";

        $query = "SELECT `barang_keluar`.`id_barangkeluar`, `barang`.`nama_barang`, `barang_keluar`.`tgl_keluar`, `barang_keluar`.`stok_keluar`, `barang_keluar`.`total`, `supplier`.`nama_supplier` FROM `barang_keluar` INNER JOIN `barang` ON barang.`id_barang` = `barang_keluar`.`id_barang` INNER JOIN `supplier` on `barang`.`id_supplier` = `supplier`.`id_supplier` ORDER BY id_barangkeluar";
        return $this->db->query($query)->result_array();
    }

    public function getAllBarangKeluar1()
    {
        return $this->db->get('barang_keluar')->result_array();
    }

    public function getAllBarang2()
    {
        return $this->db->get('barang')->result_array();
    }

    public function addDataBarangKeluar()
    {
        $data = [
            // 'id_barangkeluar' => $this->input->post('id_barangkeluar', true),
            'id_barang' => $this->input->post('id_barang', true),
            'tgl_keluar' => $this->input->post('tgl_keluar', true),
            'stok_keluar' => $this->input->post('stok_keluar', true),
            'total' => $this->input->post('total', true)
        ];
        $this->db->insert('barang_keluar', $data);
    }

    public function deleteDataBarangKeluar($id_barangkeluar)
    {
        $this->db->delete('barang_keluar', ['id_barangkeluar' => $id_barangkeluar]);
    }

    public function getBarangKeluarById($id_barangkeluar)
    {
        return $this->db->get_where('barang_keluar', ['id_barangkeluar' => $id_barangkeluar])->row_array();
    }

    public function editDataBarangKeluar()
    {
        $data = [
            'id_barangkeluar' => $this->input->post('id_barangkeluar', true),
            'id_barang' => $this->input->post('id_barang', true),
            'tgl_keluar' => $this->input->post('tgl_keluar', true),
            'stok_keluar' => $this->input->post('stok_keluar', true),
            'total' => $this->input->post('total', true)
        ];
        $this->db->where('id_barangkeluar', $this->input->post('id_barangkeluar'));
        $this->db->update('barang_keluar', $data);
    }

    public function KodeUnikBarangKeluar()
    {
        $this->db->select('RIGHT(barang_keluar.id_barangkeluar,5) as kode_barangkeluar', FALSE);
        $this->db->order_by('kode_barangkeluar','DESC');
        $this->db->limit(1);
        $query = $this->db->get('barang_keluar');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_barangkeluar) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "BK".$batas;
        return $kodetampil;
    }

}