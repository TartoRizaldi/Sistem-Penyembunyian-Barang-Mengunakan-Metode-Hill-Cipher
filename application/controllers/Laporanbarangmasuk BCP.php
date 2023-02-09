<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporanbarangmasuk extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporanbarangmasuk_model');
        $this->load->library('form_validation');
        // is_logged_in();
    }

    public function index()
    {
        
        $data['title'] = 'Data Laporan Barang Masuk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang_masuk'] = $this->Laporanbarangmasuk_model->getAllBarangMasuk();
                
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporanbarangmasuk/index', $data);
        $this->load->view('templates/footer');
    }

    public function pdfLaporanBarangMasuk()
    {
        // panggil library yang kita buat sebelum nya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $data['title'] = 'Data Laporan Barang Masuk';
        $data['barang_masuk'] = $this->Laporanbarangmasuk_model->getAllBarangMasuk();

        // filename dari pdf ketika didownload
        $file_pdf = 'Data Laporan Barang Masuk';
        // setting paper
        $paper = 'A4';
        // orientasi paper potratit / landscape
        $orientation = "potrait";

        $html = $this->load->view('laporanbarangmasuk/pdflaporanbarangmasuk', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

        // $config = array(
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_port' => 465,
        //     'smtp_user' => 'abdulbaari1903@gmail.com',
        //     'smtp_pass' => 'B4di060621*',
        //     'mailtype' => 'html',
        //     'charset' => 'iso-8859-1',
        // );

        // $this->load->library('email', $config);
        // $this->email->set_newline("\r\n");
        // $this->email->from('abdulbaari1903@gmail.com', 'bari');
        // $this->email->to('abproject28@gmail.com');
        // $this->email->subject('test email');
        // $this->email->message('ini email pertama saya');

        // return $this->email->send();
    }
}