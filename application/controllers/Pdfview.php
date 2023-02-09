<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfview extends CI_Controller {
    public function index()
    {
        // panggil library yang kita buat sebelum nya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Data Supplier';

        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Data Supplier';
        // setting paper
        $paper = 'A4';
        // orientasi paper potratit / landscape
        $orientation = "potrait";

        $html = $this->load->view('laporan_pdf', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}