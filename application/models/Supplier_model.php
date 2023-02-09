<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_model 
{
    public function getAllSupplier()
    {
        return $this->db->get('supplier')->result_array();
    }

    public function addDataSupplier()
    {
        $data = [
            'id_supplier' => $this->input->post('id_supplier', true),
            'nama_supplier' => $this->input->post('nama_supplier', true),
            'alamat_supplier' => $this->input->post('alamat_supplier', true)
        ];
        $this->db->insert('supplier', $data);
    }

    public function deleteDataSupplier($id_supplier)
    {
        $this->db->delete('supplier', ['id_supplier' => $id_supplier]);
    }

    public function getSupplierById($id_supplier)
    {
        return $this->db->get_where('supplier', ['id_supplier' => $id_supplier])->row_array();
    }

    public function editDataSupplier()
    {
        $data = [
            'id_supplier' => $this->input->post('id_supplier', true),
            'nama_supplier' => $this->input->post('nama_supplier', true),
            'alamat_supplier' => $this->input->post('alamat_supplier', true)
        ];
        $this->db->where('id_supplier', $this->input->post('id_supplier'));
        $this->db->update('supplier', $data);
    }

    public function KodeUnikSupplier()
    {
        $this->db->select('RIGHT(supplier.id_supplier,5) as kode_supplier', FALSE);
        $this->db->order_by('kode_supplier','DESC');
        $this->db->limit(1);
        $query = $this->db->get('supplier');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_supplier) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "SP".$batas;
        return $kodetampil;
    }
}
