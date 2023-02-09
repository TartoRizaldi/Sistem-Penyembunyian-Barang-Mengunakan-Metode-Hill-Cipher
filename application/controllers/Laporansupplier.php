<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporansupplier extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporansupplier_model');
        $this->load->library('form_validation');
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Laporan Supplier';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['supplier'] = $this->Laporansupplier_model->getAllSupplier();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporansupplier/index', $data);
        $this->load->view('templates/footer');
    }

    // public function pdfLaporanSupplier()
    // {
    //     // panggil library yang kita buat sebelum nya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     // title dari pdf
    //     $data['title'] = 'Data Laporan Supplier';
    //     $data['supplier'] = $this->Laporansupplier_model->getAllSupplier();

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'Data Laporan Supplier';
    //     // setting paper
    //     $paper = 'A4';
    //     // orientasi paper potratit / landscape
    //     $orientation = "potrait";

    //     $html = $this->load->view('laporansupplier/pdflaporansupplier', $data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

    //     // $this->load->view('laporansupplier/laporan_pdf');
    // }

    public function pdfLaporanSupplier()
    {
        // // panggil library yang kita buat sebelum nya yang bernama pdfgenerator
        // $this->load->library('pdfgenerator');

        // // title dari pdf
        // $data['title'] = 'Data Laporan Supplier';
        // $data['supplier'] = $this->Laporansupplier_model->getAllSupplier();

        // // filename dari pdf ketika didownload
        // $file_pdf = 'Data Laporan Supplier';
        // // setting paper
        // $paper = 'A4';
        // // orientasi paper potratit / landscape
        // $orientation = "potrait";

        // $html = $this->load->view('laporansupplier/pdflaporansupplier', $data, true);

        // // run dompdf
        // $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

        // // $this->load->view('laporansupplier/laporan_pdf');

        $data['title'] = 'Data Laporan Supplier';
        $data['supplier'] = $this->Laporansupplier_model->getAllSupplier();
        $this->load->view('laporansupplier/pdflaporansupplier', $data);
    }
}
