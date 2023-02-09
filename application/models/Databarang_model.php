<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Databarang_model extends CI_model 
{

    public function getAllbarang()
    {
        $this->load->library('../controllers/hillcipher');
        $query = "SELECT barang.`id_barang`, barang.`nama_barang`, satuan.`nama_satuan`, barang.`stok`, barang.`harga`, supplier.`nama_supplier`, user.`id`
        FROM barang
        INNER JOIN satuan ON satuan.`id_satuan` = barang.`id_satuan`
        INNER JOIN supplier ON supplier.`id_supplier` = barang.`id_supplier`
        INNER JOIN user on user.`id` = barang.`id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getAllSatuan1()
    {
        return $this->db->get('satuan')->result_array();
    }

    public function getAllSupplier1()
    {
        return $this->db->get('supplier')->result_array();
    }

    public function addDataBarang()
    {
        $this->load->library('../controllers/hillcipher');
        $data = [
            'id_barang' => $this->input->post('id_barang', true),
            'nama_barang' => $this->hillcipher->encrypt($this->input->post('nama_barang', true)),
            'id_satuan' => $this->input->post('id_satuan', true),
            'stok' => $this->hillcipher->encrypt("0"),
            'harga' => $this->input->post('harga', true),
            'id_supplier' => $this->input->post('id_supplier', true),
            'id' => $this->input->post('id', true)
        ];
        $this->db->insert('barang', $data);
    }

    public function deleteDataBarang($id_barang)
    {
        $this->db->delete('barang', ['id_barang' => $id_barang]);
    }

    public function getBarangById($id_barang)
    {
        return $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
    }

    public function editDataBarang()
    {
        $this->load->library('../controllers/hillcipher');
        $data = [
            'id_barang' => $this->input->post('id_barang', true),
            'nama_barang' => $this->hillcipher->encrypt($this->input->post('nama_barang', true)),
            'id_satuan' => $this->input->post('id_satuan', true),
            'stok' => 0,
            'harga' => $this->input->post('harga', true),
            'id_supplier' => $this->input->post('id_supplier', true)
        ];
        $this->db->where('id_barang', $this->input->post('id_barang'));
        $this->db->update('barang', $data);
    }

    public function KodeUnikBarang()
    {
        $this->db->select('RIGHT(barang.id_barang,5) as kode_barang', FALSE);
        $this->db->order_by('kode_barang','DESC');
        $this->db->limit(1);
        $query = $this->db->get('barang');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_barang) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "BR".$batas;
        return $kodetampil;
    }

}