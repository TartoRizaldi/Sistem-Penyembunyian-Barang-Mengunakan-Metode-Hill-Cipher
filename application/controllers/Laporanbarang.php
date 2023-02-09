<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporanbarang extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporanbarang_model');
        $this->load->library('form_validation');
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Laporan Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang'] = $this->Laporanbarang_model->getAllBarang(); 
        $this->load->library('../controllers/hillcipher');

        for ($i=0; $i < count($data['barang']) ; $i++) { 
            $data['barang'][$i]['nama_barang'] = $this->hillcipher->decrypt($data['barang'][$i]['nama_barang']);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporanbarang/index', $data);
        $this->load->view('templates/footer');
    }

    // public function pdfLaporanBarang()
    // {
    //     // panggil library yang kita buat sebelum nya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     // title dari pdf
    //     $data['title'] = 'Data Laporan Barang';
    //     $data['barang'] = $this->Laporanbarang_model->getAllBarang();

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'Data Laporan Barang';
    //     // setting paper
    //     $paper = 'A4';
    //     // orientasi paper potratit / landscape
    //     $orientation = "potrait";

    //     $html = $this->load->view('laporanbarang/pdflaporanbarang', $data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }

    public function pdfLaporanBarang()
    {
        $data['title'] = 'Data Laporan Barang';
        $data['barang'] = $this->Laporanbarang_model->getAllBarang();
        $this->load->library('../controllers/hillcipher');

        for ($i=0; $i < count($data['barang']) ; $i++) { 
            $data['barang'][$i]['nama_barang'] = $this->hillcipher->decrypt($data['barang'][$i]['nama_barang']);
        }
        $this->load->view('laporanbarang/pdflaporanbarang', $data);
    }
}