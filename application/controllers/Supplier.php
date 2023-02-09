<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model');
        $this->load->library('form_validation');
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Supplier';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['supplier'] = $this->Supplier_model->getAllSupplier();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supplier/index', $data);
        $this->load->view('templates/footer');
    }

    public function addSupplier()
    {
        $data['title'] = 'Data Supplier';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kode_supplier'] = $this->Supplier_model->KodeUnikSupplier();

        $this->form_validation->set_rules('id_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('alamat_supplier', 'Alamat Supplier', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('supplier/addsupplier', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Supplier_model->addDataSupplier();
            $this->session->set_flashdata(
                'message', '<div class="alert alert-success" role="alert"> Supplier Baru berhasil <b>ditambahkan!</b></div>'
            );
            redirect('supplier');
        }
        
    }

    public function deleteSupplier($id_supplier)
    {
        $this->Supplier_model->deleteDataSupplier($id_supplier);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Data Supplier berhasil <b>dihapus!</b></div>'
        );
        redirect('supplier');
    }

    public function editSupplier($id_supplier)
    {
        $data['title'] = 'Edit Data Supplier';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['supplier'] = $this->Supplier_model->getSupplierById($id_supplier);

        $this->form_validation->set_rules('id_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('alamat_supplier', 'Alamat Supplier', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('supplier/editsupplier', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Supplier_model->editDataSupplier();
            $this->session->set_flashdata(
                'message', '<div class="alert alert-success" role="alert"> Data Supplier berhasil <b>diedit!</b></div>'
            );
            redirect('supplier');
        }
    }

    
}
