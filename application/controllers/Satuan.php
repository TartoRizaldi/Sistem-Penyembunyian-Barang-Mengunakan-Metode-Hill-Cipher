<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Satuan_model');
        $this->load->library('form_validation');
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Satuan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['satuan'] = $this->Satuan_model->getAllSatuan();

        // $this->form_validation->set_rules('menu', 'Menu', 'required');

        // if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('satuan/index', $data);
        $this->load->view('templates/footer');
        // } else {
        //     $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Baru Ditambahkan!</div>');
        //     redirect('menu');
        // }
    }

    public function addSatuan()
    {
        $data['title'] = 'Form Tambah Satuan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('satuan/addsatuan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Satuan_model->addDataSatuan();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Satuan Baru <b>Ditambahkan!</b></div>'
            );
            redirect('satuan');
        }
    }

    public function deleteSatuan($id_satuan)
    {
        $this->Satuan_model->deleteDataSatuan($id_satuan);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Satuan telah <b>Dihapus!</b></div>'
        );
        redirect('satuan');
    }

    public function editSatuan($id_satuan)
    {
        $data['title'] = 'Form Edit Satuan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['satuan'] = $this->Satuan_model->getSatuanById($id_satuan);

        $this->form_validation->set_rules('id_satuan', 'ID Satuan', 'required');
        $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('satuan/editsatuan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Satuan_model->editDataSatuan();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Satuan telah <b>Diedit!</b></div>'
            );
            redirect('satuan');
        }
    }
}