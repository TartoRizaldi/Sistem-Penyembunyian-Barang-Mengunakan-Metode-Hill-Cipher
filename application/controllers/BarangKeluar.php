<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barangkeluar_model');
        $this->load->library('form_validation');
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang_keluar'] = $this->Barangkeluar_model->getAllBarangKeluar();

        $this->load->library('../controllers/hillcipher');

        for ($i=0; $i < count($data['barang_keluar']) ; $i++) { 
            $data['barang_keluar'][$i]['nama_barang'] = $this->hillcipher->decrypt($data['barang_keluar'][$i]['nama_barang']);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barangkeluar/index', $data);
        $this->load->view('templates/footer');
    }

    // public function addBarangKeluar()
    // {
    //     $data['title'] = 'Tambah Data Barang Keluar';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['barang_keluar'] = $this->Barangkeluar_model->getAllBarangKeluar();
    //     $data['barang'] = $this->Barangkeluar_model->getAllBarang2();
    //     $data['kode_barangkeluar'] = $this->Barangkeluar_model->KodeUnikBarangKeluar();

    //     $this->form_validation->set_rules('id_barangkeluar', 'Kode Barang Keluar', 'required');
    //     $this->form_validation->set_rules('id_barang', 'Nama Barang', 'required');
    //     $this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'required');
    //     $this->form_validation->set_rules('stok_keluar', 'Stok Keluar', 'required|numeric');
    //     $this->form_validation->set_rules('total', 'Total', 'required|numeric');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('barangkeluar/addbarangkeluar', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $this->Barangkeluar_model->addDataBarangKeluar();
    //         $this->session->set_flashdata(
    //             'message', '<div class="alert alert-success" role="alert"> Barang Keluar berhasil <b>ditambahkan!</b></div>'
    //         );
    //         redirect('barangkeluar');
    //     }
        
    // }

    public function addBarangKeluar()
    {
        $data['title'] = 'Tambah Data Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang_keluar'] = $this->Barangkeluar_model->getAllBarangKeluar();
        $data['barang'] = $this->Barangkeluar_model->getAllBarang2();
        $data['kode_barangkeluar'] = $this->Barangkeluar_model->KodeUnikBarangKeluar();

        $this->load->library('../controllers/hillcipher');

        for ($i=0; $i < count($data['barang']) ; $i++) { 
            $data['barang'][$i]['nama_barang'] = $this->hillcipher->decrypt($data['barang'][$i]['nama_barang']);
        }

        // $this->form_validation->set_rules('id_barangkeluar', 'Kode Barang Keluar', 'required');
        $this->form_validation->set_rules('id_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'required');
        $this->form_validation->set_rules('stok_keluar', 'Stok Keluar', 'required|numeric');
        $this->form_validation->set_rules('total', 'Total', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('barangkeluar/addbarangkeluar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Barangkeluar_model->addDataBarangKeluar();
            $this->session->set_flashdata(
                'message', '<div class="alert alert-success" role="alert"> Barang Keluar berhasil <b>ditambahkan!</b></div>'
            );
            redirect('barangkeluar');
        }
        
    }

    public function deleteBarangKeluar($id_barangkeluar)
    {
        $this->Barangkeluar_model->deleteDataBarangKeluar($id_barangkeluar);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Data Barang Keluar berhasil <b>dihapus!</b></div>'
        );
        redirect('barangkeluar');
    }

    public function editBarangKeluar($id_barangkeluar)
    {
        $data['title'] = 'Edit Data Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang_keluar'] = $this->Barangkeluar_model->getAllBarangKeluar();
        // $data['barang_keluar'] = $this->Barangkeluar_model->getAllBarangKeluar1();
        $data['barang_keluar'] = $this->Barangkeluar_model->getBarangKeluarById($id_barangkeluar);
        $data['barang'] = $this->Barangkeluar_model->getAllBarang2();
        // $data['supplier'] = $this->Barangmasuk_model->getAllSupplier1();

        $this->load->library('../controllers/hillcipher');

        for ($i=0; $i < count($data['barang']) ; $i++) { 
            $data['barang'][$i]['nama_barang'] = $this->hillcipher->decrypt($data['barang'][$i]['nama_barang']);
        }

        $this->form_validation->set_rules('id_barangkeluar', 'Kode Barang Masuk', 'required');
        $this->form_validation->set_rules('id_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('tgl_keluar', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('stok_keluar', 'Stok Masuk', 'required|numeric');
        $this->form_validation->set_rules('total', 'Total', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('barangkeluar/editbarangkeluar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Barangkeluar_model->editDataBarangKeluar();
            $this->session->set_flashdata(
                'message', '<div class="alert alert-success" role="alert"> Barang Keluar berhasil <b>diedit!</b></div>'
            );
            redirect('barangkeluar');
        }
        
    }


}