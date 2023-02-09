<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangmasuk_model extends CI_model 
{
    public function getAllBarangMasuk()
    {
        // $query = "SELECT `barang_masuk`.`id_barangmasuk`, `barang`.`nama_barang`, `barang_masuk`.`tgl_masuk`, `barang_masuk`.`stok_masuk`, `barang_masuk`.`total`, `supplier`.`nama_supplier` FROM `barang_masuk` INNER JOIN `barang` ON barang.`id_barang` = `barang_masuk`.`id_barang` INNER JOIN `supplier` ON `supplier`.`id_supplier` = `barang_masuk`.`id_barang`";

        // $query = "SELECT `barang_masuk`.`id_barangmasuk`, `barang`.`nama_barang`, `barang_masuk`.`tgl_masuk`, `barang_masuk`.`stok_masuk`, `barang_masuk`.`total`, `supplier`.`nama_supplier` FROM `barang_masuk` INNER JOIN `barang` ON barang.`id_barang` = `barang_masuk`.`id_barang` INNER JOIN `supplier` on `barang`.`id_supplier` = `supplier`.`id_supplier` ORDER BY id_barangmasuk";

        $query = "select barang_masuk.id_barangmasuk, barang.nama_barang, barang_masuk.tgl_masuk, barang_masuk.stok_masuk, (barang_masuk.stok_masuk * barang.harga) as total, supplier.nama_supplier
        from barang_masuk
        inner JOIN barang on barang_masuk.id_barang = barang.id_barang
        inner JOIN supplier on barang.id_supplier = supplier.id_supplier
        order by id_barangmasuk asc";

        return $this->db->query($query)->result_array();
    }

    public function getAllBarangMasuk1()
    {
        return $this->db->get('barang_masuk')->result_array();
    }

    public function getAllBarang1()
    {
        return $this->db->get('barang')->result_array();
    }

    public function getAllSupplier1()
    {
        return $this->db->get('supplier')->result_array();
    }

    public function addDataBarangMasuk()
    {
        $this->load->library('../controllers/hillcipher');
        $data = [
            // 'id_barangmasuk' => $this->input->post('id_barangmasuk', true),
            'id_barang' => $this->input->post('id_barang', true),
            'tgl_masuk' => $this->input->post('tgl_masuk', true),
            'stok_masuk' => $this->input->post('stok_masuk', true),
            'total' => $this->input->post('total', true)
            // 'id_supplier' => $this->input->post('id_supplier', true)
        ];
        $this->db->insert('barang_masuk', $data);
    }

    public function deleteDataBarangMasuk($id_barangmasuk)
    {
        $this->db->delete('barang_masuk', ['id_barangmasuk' => $id_barangmasuk]);
    }

    public function getBarangMasukById($id_barangmasuk)
    {
        return $this->db->get_where('barang_masuk', ['id_barangmasuk' => $id_barangmasuk])->row_array();
    }

    public function editDataBarangMasuk()
    {
        $data = [
            'id_barangmasuk' => $this->input->post('id_barangmasuk', true),
            'id_barang' => $this->input->post('id_barang', true),
            'tgl_masuk' => $this->input->post('tgl_masuk', true),
            'stok_masuk' => $this->input->post('stok_masuk', true),
            'total' => $this->input->post('total', true)
            // 'id_supplier' => $this->input->post('id_supplier', true)
        ];
        $this->db->where('id_barangmasuk', $this->input->post('id_barangmasuk'));
        $this->db->update('barang_masuk', $data);
    }

    public function KodeUnikBarangMasuk()
    {
        $this->db->select('RIGHT(barang_masuk.id_barangmasuk,5) as kode_barangmasuk', FALSE);
        $this->db->order_by('kode_barangmasuk','DESC');
        $this->db->limit(1);
        $query = $this->db->get('barang_masuk');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_barangmasuk) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "BM".$batas;
        return $kodetampil;
    }

    public function totalHarga($id_barangmasuk)
    {
        $query = "select (barang.harga * barang_masuk.stok_masuk) as total from barang inner join barang_masuk on barang.id_barang = barang_masuk.id_barang
        where barang_masuk.id_barangmasuk = '".$id_barangmasuk."'";
        return $this->db->query($query)->result_array();
    }
}