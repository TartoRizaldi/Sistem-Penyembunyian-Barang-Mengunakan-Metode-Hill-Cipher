<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangmasuk extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barangmasuk_model');
        $this->load->library('form_validation');
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Barang Masuk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang_masuk'] = $this->Barangmasuk_model->getAllBarangMasuk();

        $this->load->library('../controllers/hillcipher');

        for ($i=0; $i < count($data['barang_masuk']) ; $i++) { 
            $data['barang_masuk'][$i]['nama_barang'] = $this->hillcipher->decrypt($data['barang_masuk'][$i]['nama_barang']);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barangmasuk/index', $data);
        $this->load->view('templates/footer');
    }

    // public function addBarangMasuk()
    // {
    //     $data['title'] = 'Tambah Data Barang Masuk';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['barang_masuk'] = $this->Barangmasuk_model->getAllBarangMasuk();
    //     $data['barang'] = $this->Barangmasuk_model->getAllBarang1();
    //     // $data['supplier'] = $this->Barangmasuk_model->getAllSupplier1();
    //     $data['kode_barangmasuk'] = $this->Barangmasuk_model->KodeUnikBarangMasuk();

    //     $this->form_validation->set_rules('id_barangmasuk', 'Kode Barang Masuk', 'required');
    //     $this->form_validation->set_rules('id_barang', 'Nama Barang', 'required');
    //     $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
    //     $this->form_validation->set_rules('stok_masuk', 'Stok Masuk', 'required|numeric');
    //     $this->form_validation->set_rules('total', 'Total', 'required|numeric');
    //     // $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('barangmasuk/addbarangmasuk', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $this->Barangmasuk_model->addDataBarangMasuk();
    //         $this->session->set_flashdata(
    //             'message', '<div class="alert alert-success" role="alert"> Barang Masuk berhasil <b>ditambahkan!</b></div>'
    //         );
    //         redirect('barangmasuk');
    //     }
        
    // }

    public function addBarangMasuk()
    {
        $data['title'] = 'Tambah Data Barang Masuk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang_masuk'] = $this->Barangmasuk_model->getAllBarangMasuk();
        $data['barang'] = $this->Barangmasuk_model->getAllBarang1();
        // $data['supplier'] = $this->Barangmasuk_model->getAllSupplier1();
        $data['kode_barangmasuk'] = $this->Barangmasuk_model->KodeUnikBarangMasuk();

        $this->load->library('../controllers/hillcipher');

        for ($i=0; $i < count($data['barang']) ; $i++) { 
            $data['barang'][$i]['nama_barang'] = $this->hillcipher->decrypt($data['barang'][$i]['nama_barang']);
        }

        // $this->form_validation->set_rules('id_barangmasuk', 'Kode Barang Masuk', 'required');
        $this->form_validation->set_rules('id_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('stok_masuk', 'Stok Masuk', 'required|numeric');
        $this->form_validation->set_rules('total', 'Total', 'required|numeric');
        // $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('barangmasuk/addbarangmasuk', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Barangmasuk_model->addDataBarangMasuk();
            $this->session->set_flashdata(
                'message', '<div class="alert alert-success" role="alert"> Barang Masuk berhasil <b>ditambahkan!</b></div>'
            );
            redirect('barangmasuk');
        }
        
    }

    public function deleteBarangMasuk($id_barangmasuk)
    {
        $this->Barangmasuk_model->deleteDataBarangMasuk($id_barangmasuk);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Data Barang Masuk berhasil <b>dihapus!</b></div>'
        );
        redirect('barangmasuk');
    }

    public function editBarangMasuk($id_barangmasuk)
    {
        $data['title'] = 'Edit Data Barang Masuk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang_masuk'] = $this->Barangmasuk_model->getAllBarangMasuk1();
        $data['barang_masuk'] = $this->Barangmasuk_model->getAllBarangMasuk();
        $data['barang_masuk'] = $this->Barangmasuk_model->getBarangMasukById($id_barangmasuk);
        $data['barang'] = $this->Barangmasuk_model->getAllBarang1();
        // $data['supplier'] = $this->Barangmasuk_model->getAllSupplier1();

        $this->load->library('../controllers/hillcipher');

        for ($i=0; $i < count($data['barang']) ; $i++) { 
            $data['barang'][$i]['nama_barang'] = $this->hillcipher->decrypt($data['barang'][$i]['nama_barang']);
        }

        $this->form_validation->set_rules('id_barangmasuk', 'Kode Barang Masuk', 'required');
        $this->form_validation->set_rules('id_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('stok_masuk', 'Stok Masuk', 'required|numeric');
        $this->form_validation->set_rules('total', 'Total', 'required|numeric');
        // $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('barangmasuk/editbarangmasuk', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Barangmasuk_model->editDataBarangMasuk();
            $this->session->set_flashdata(
                'message', '<div class="alert alert-success" role="alert"> Barang Masuk berhasil <b>ditambahkan!</b></div>'
            );
            redirect('barangmasuk');
        }
        
    }
}