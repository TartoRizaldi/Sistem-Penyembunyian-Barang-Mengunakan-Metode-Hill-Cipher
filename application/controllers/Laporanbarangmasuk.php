<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporanbarangmasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporanbarangmasuk_model');
        $this->load->library('form_validation');
        $this->load->library('../controllers/hillcipher');
        // is_logged_in();
    }

    public function index()
    {

        $data['title'] = 'Data Laporan Barang Masuk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang_masuk'] = $this->Laporanbarangmasuk_model->getAllBarangMasuk();
        
        $data['tahun'] = $this->Laporanbarangmasuk_model->getTahun();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporanbarangmasuk/index', $data);
        $this->load->view('templates/footer');
    }

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
            $data['title'] = "Laporan Barang Masuk by Tanggal";
            $data['subtitle'] = "Dari Tanggal :" . $tanggalawal . ' Sampai tanggal " ' . $tanggalakhir;
            $data['datafilter'] = $this->Laporanbarangmasuk_model->filterByTanggal($tanggalawal, $tanggalakhir);

            $this->load->view('laporanbarangmasuk/pdflaporanbarangmasuk', $data);

        } else if ($nilaifilter == 2) {
            $data['title'] = "Laporan Barang Masuk by Bulan";
            $data['subtitle'] = "Dari Bulan :" . $bulanawal . ' Sampai Bulan " ' . $bulanakhir . ' Tahun : ' . $tahun1;
            $data['datafilter'] = $this->Laporanbarangmasuk_model->filterByBulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('laporanbarangmasuk/pdflaporanbarangmasuk', $data);

        } else if ($nilaifilter == 3) {
            $data['title'] = "Laporan Barang Masuk by Tahun";
            $data['subtitle'] = "Tahun : " . $tahun2;
            $data['datafilter'] = $this->Laporanbarangmasuk_model->filterByTahun($tahun2);

            $this->load->view('laporanbarangmasuk/pdflaporanbarangmasuk', $data);
        }
    }

}
