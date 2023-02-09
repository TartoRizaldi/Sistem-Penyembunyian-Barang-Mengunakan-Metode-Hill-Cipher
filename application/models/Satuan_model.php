<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_model extends CI_Model
{
    public function getAllSatuan()
    {
        return $this->db->get('satuan')->result_array();
    }

    public function addDataSatuan()
    {
        $data = ['nama_satuan' => $this->input->post('nama_satuan', true)];
        $this->db->insert('satuan', $data);
    }

    public function deleteDataSatuan($id_satuan)
    {
        $this->db->delete('satuan', ['id_satuan' => $id_satuan]);
    }

    public function getSatuanById($id_satuan)
    {
        return $this->db->get_where('satuan', ['id_satuan' => $id_satuan])->row_array();
    }

    public function editDataSatuan()
    {
        $data = [
            'id_satuan' => $this->input->post('id_satuan', true),
            'nama_satuan' => $this->input->post('nama_satuan', true)
        ];
        $this->db->where('id_satuan', $this->input->post('id_satuan'));
        $this->db->update('satuan', $data);
    }
}