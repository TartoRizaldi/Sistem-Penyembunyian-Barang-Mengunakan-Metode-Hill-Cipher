<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporanbarangkeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporanbarangkeluar_model');
        $this->load->library('form_validation');
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Laporan Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang_keluar'] = $this->Laporanbarangkeluar_model->getAllBarangKeluar();
        $data['tahun'] = $this->Laporanbarangkeluar_model->getTahun();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporanbarangkeluar/index', $data);
        $this->load->view('templates/footer');
    }

    // function filter()
    // {
    //     $tanggalawal = $this->input->post('tanggalawal');
    //     $tanggalakhir = $this->input->post('tanggalakhir');
    //     $tahun1 = $this->input->post('tahun1');
    //     $bulanawal = $this->input->post('bulanawal');
    //     $bulanakhir = $this->input->post('bulanakhir');
    //     $tahun2 = $this->input->post('tahun2');
    //     $nilaifilter = $this->input->post('nilaifilter');

    //     $config = array(
    //         'protocol' => 'smtp',
    //         'smtp_host' => 'ssl://smtp.googlemail.com',
    //         'smtp_port' => 465,
    //         'smtp_user' => 'sispebar@gmail.com',
    //         'smtp_pass' => 'Sispebar123',
    //         'mailtype' => 'html',
    //         'charset' => 'iso-8859-1',
    //     );

    //     if ($nilaifilter == 1) {
    //         $data['title'] = "Laporan Barang Keluar by Tanggal";
    //         $data['subtitle'] = "Dari Tanggal :" . $tanggalawal . ' Sampai tanggal " ' . $tanggalakhir;
    //         $data['datafilter'] = $this->Laporanbarangkeluar_model->filterByTanggal($tanggalawal, $tanggalakhir);

    //         $this->load->library('pdfgenerator');
    //         $file_pdf = 'Data Laporan Barang Keluar Tanggal ' . $tanggalawal . '-' . $tanggalakhir;
    //         // setting paper
    //         $paper = 'A4';
    //         // orientasi paper potratit / landscape
    //         $orientation = "potrait";

    //         $this->load->library('email', $config);
    //         $this->email->set_newline("\r\n");
    //         $this->email->from('sispebar@gmail.com');
    //         $this->email->to('abdulbaari1903@gmail.com');
    //         $this->email->cc('sispebar@gmail.com');
    //         $this->email->subject('Laporan Barang Keluar');
    //         $this->email->message('Data laporan barang Keluar dari tanggal ' . $tanggalawal . ' sampai dengan tanggal ' . $tanggalakhir);
    //         $this->email->attach('C:/xampp/htdocs/sispebar/assets/print/' . $file_pdf . '.pdf');

    //         // if (!$this->email->send()) {
    //         //     echo 'gagal kirim pesan, cek server anda';
    //         // } else {
    //         //     $sukses = array('sukses' => 'selamat, email anda telah terkirim');
    //         //     $html = $this->load->view('laporanbarangkeluar/pdflaporanbarangkeluar', $data, true);
    //         // }
    //         $html = $this->load->view('laporanbarangkeluar/pdflaporanbarangkeluar', $data, true);
    //         // run dompdf
    //         $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    //     } else if ($nilaifilter == 2) {
    //         $data['title'] = "Laporan Barang Keluar by Bulan";
    //         $data['subtitle'] = "Dari Bulan :" . $bulanawal . ' Sampai Bulan " ' . $bulanakhir . ' Tahun : ' . $tahun1;
    //         $data['datafilter'] = $this->Laporanbarangkeluar_model->filterByBulan($tahun1, $bulanawal, $bulanakhir);

    //         $this->load->library('pdfgenerator');
    //         $file_pdf = 'Data Laporan Barang Keluar Bulan ' . $bulanawal . '-' . $bulanakhir . ' ' . $tahun1;
    //         // setting paper
    //         $paper = 'A4';
    //         // orientasi paper potratit / landscape
    //         $orientation = "potrait";

    //         $this->load->library('email', $config);
    //         $this->email->set_newline("\r\n");
    //         $this->email->from('sispebar@gmail.com');
    //         $this->email->to('abdulbaari1903@gmail.com');
    //         $this->email->cc('sispebar@gmail.com');
    //         $this->email->subject('Laporan Barang Keluar');
    //         $this->email->message('Data laporan barang Keluar dari Bulan ' . $bulanawal . ' sampai dengan bulan ' . $bulanakhir . ' ' . $tahun1);
    //         $this->email->attach('C:/xampp/htdocs/sispebar/assets/print/' . $file_pdf . '.pdf');

    //         // if (!$this->email->send()) {
    //         //     echo 'gagal kirim pesan, cek server anda';
    //         // } else {
    //         //     $sukses = array('sukses' => 'selamat, email anda telah terkirim');
    //         //     // $this->load->view('laporanbarangmasuk/pdflaporanbarangmasuk', $data, $sukses);
    //         //     $html = $this->load->view('laporanbarangkeluar/pdflaporanbarangkeluar', $data, true);
    //         // }
    //         $html = $this->load->view('laporanbarangkeluar/pdflaporanbarangkeluar', $data, true);
    //         // run dompdf
    //         $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    //     } else if ($nilaifilter == 3) {
    //         $data['title'] = "Laporan Barang keluar by Tahun";
    //         $data['subtitle'] = "Tahun : " . $tahun2;
    //         $data['datafilter'] = $this->Laporanbarangkeluar_model->filterByTahun($tahun2);

    //         $this->load->library('pdfgenerator');
    //         $file_pdf = 'Data Laporan Barang keluar Tahun ' . $tahun2;
    //         // setting paper
    //         $paper = 'A4';
    //         // orientasi paper potratit / landscape
    //         $orientation = "potrait";

    //         $this->load->library('email', $config);
    //         $this->email->set_newline("\r\n");
    //         $this->email->from('sispebar@gmail.com');
    //         $this->email->to('abdulbaari1903@gmail.com');
    //         $this->email->cc('sispebar@gmail.com');
    //         $this->email->subject('Laporan Barang keluar');
    //         $this->email->message('Data laporan barang keluar Tahun ' . $tahun2);
    //         $this->email->attach('C:/xampp/htdocs/sispebar/assets/print/' . $file_pdf . '.pdf');

    //         // if (!$this->email->send()) {
    //         //     echo 'gagal kirim pesan, cek server anda';
    //         // } else {
    //         //     $sukses = array('sukses' => 'selamat, email anda telah terkirim');
    //         //     $html = $this->load->view('laporanbarangkeluar/pdflaporanbarangkeluar', $data, true);
    //         // }
    //         $html = $this->load->view('laporanbarangkeluar/pdflaporanbarangkeluar', $data, true);
    //         // run dompdf
    //         $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    //     }
    // }

    function filter()
    {
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');

        if ($nilaifilter == 1) {
            $data['title'] = "Laporan Barang Keluar by Tanggal";
            $data['subtitle'] = "Dari Tanggal :" . $tanggalawal . ' Sampai tanggal " ' . $tanggalakhir;
            $data['datafilter'] = $this->Laporanbarangkeluar_model->filterByTanggal($tanggalawal, $tanggalakhir);

            $this->load->view('laporanbarangkeluar/pdflaporanbarangkeluar', $data);
        } else if ($nilaifilter == 2) {
            $data['title'] = "Laporan Barang Keluar by Bulan";
            $data['subtitle'] = "Dari Bulan :" . $bulanawal . ' Sampai Bulan " ' . $bulanakhir . ' Tahun : ' . $tahun1;
            $data['datafilter'] = $this->Laporanbarangkeluar_model->filterByBulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('laporanbarangkeluar/pdflaporanbarangkeluar', $data);
        } else if ($nilaifilter == 3) {
            $data['title'] = "Laporan Barang keluar by Tahun";
            $data['subtitle'] = "Tahun : " . $tahun2;
            $data['datafilter'] = $this->Laporanbarangkeluar_model->filterByTahun($tahun2);

            $this->load->view('laporanbarangkeluar/pdflaporanbarangkeluar', $data);
        }
    }

    // public function pdfLaporanBarangKeluar()
    // {
    //     // panggil library yang kita buat sebelum nya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     // title dari pdf
    //     $data['title'] = 'Data Laporan Barang Keluar';
    //     $data['barang_keluar'] = $this->Laporanbarangkeluar_model->getAllBarangKeluar();

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'Data Laporan Barang Keluar';
    //     // setting paper
    //     $paper = 'A4';
    //     // orientasi paper potratit / landscape
    //     $orientation = "potrait";

    //     $html = $this->load->view('laporanbarangkeluar/pdflaporanbarangkeluar', $data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }
}
