<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Databarang extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
        // is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Data Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang'] = $this->Barang_model->getAllBarang();
        $this->load->library('../controllers/hillcipher');

        // $data['key'] = 'dfre';

        for ($i=0; $i < count($data['barang']) ; $i++) { 
            $data['barang'][$i]['nama_barang'] = $this->hillcipher->decrypt($data['barang'][$i]['nama_barang']);
        }

        // echo count($data['barang']);
        // echo json_encode($data['barang'][0]['id_barang']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('databarang/index', $data);
        $this->load->view('templates/footer');
    }

    public function encrypt(){
        $data['title'] = 'Data Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang'] = $this->Barang_model->getAllBarang();
        $this->load->library('../controllers/hillcipher');

        for ($i=0; $i < count($data['barang']) ; $i++) { 
            $data['barang'][$i]['nama_barang'] = $data['barang'][$i]['nama_barang'];
        }

        // echo count($data['barang']);
        // echo json_encode($data['barang'][0]['id_barang']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('databarang/index', $data);
        $this->load->view('templates/footer');
    }

    public function decrypt(){
        $data['title'] = 'Data Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang'] = $this->Barang_model->getAllBarang();
        $this->load->library('../controllers/hillcipher');

        for ($i=0; $i < count($data['barang']) ; $i++) { 
            $data['barang'][$i]['nama_barang'] = $this->hillcipher->decrypt($data['barang'][$i]['nama_barang']);
        }

        // echo count($data['barang']);
        // echo json_encode($data['barang'][0]['id_barang']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('databarang/index', $data);
        $this->load->view('templates/footer');
    }

    public function hillcipher()
    {
        $data['title'] = 'Enkripsi Dan Dekripsi Hill Cipher';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['satuan'] = $this->Barang_model->getAllSatuan1();
        $data['supplier'] = $this->Barang_model->getAllSupplier1();
        $data['kode_barang'] = $this->Barang_model->KodeUnikBarang();
        $data['key'] = 'dfre';
        $data['alpa'] = 'abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+-={}[]|.:;<>/ ';
        $data['barang'] = $this->Barang_model->getAllBarang();

        $this->load->library('../controllers/hillcipher');

        for ($i=0; $i < count($data['barang']) ; $i++) { 
            $data['barang'][$i]['nama_barang'] = $this->hillcipher->decrypt($data['barang'][$i]['nama_barang']);
        }

        $this->form_validation->set_rules('id_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('id_satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');
        $this->form_validation->set_rules('id', 'ID User', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('databarang/hillcipher', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Barang_model->addDataBarang();
            $this->session->set_flashdata(
                'message', '<div class="alert alert-success" role="alert"> Barang Baru berhasil <b>ditambahkan!</b></div>'
            );
            redirect('barang');
        }
        
    }

    public function encrypt2(){
        $this->load->library('../controllers/hillcipher2');
        $alpa = $this->input->post('alpa');
        $key = $this->input->post('key');
        $plaintext = $this->input->post('plaintext');

        $res = $this->hillcipher2->encrypt($plaintext,$key,$alpa);

        $response = array("encrypt" => $res);
        echo json_encode($response);
    }

    public function decrypt2(){
        $this->load->library('../controllers/hillcipher2');
        $alpa = $this->input->post('alpa');
        $key = $this->input->post('key');
        $ciphertext = $this->input->post('ciphertext');

        $res = $this->hillcipher2->decrypt($ciphertext,$key,$alpa);

        $response = array("decrypt" => $res);
        echo json_encode($response);
    }

    // public function addBarang()
    // {
    //     $data['title'] = 'Tambah Data Barang';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['satuan'] = $this->Barang_model->getAllSatuan1();
    //     $data['supplier'] = $this->Barang_model->getAllSupplier1();
    //     $data['kode_barang'] = $this->Barang_model->KodeUnikBarang();

    //     $this->form_validation->set_rules('id_barang', 'Kode Barang', 'required');
    //     $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    //     $this->form_validation->set_rules('id_satuan', 'Satuan', 'required');
    //     $this->form_validation->set_rules('stok', 'Stok', 'required');
    //     $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
    //     $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');
    //     $this->form_validation->set_rules('id', 'ID User', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('databarang/addbarang', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $this->Barang_model->addDataBarang();
    //         $this->session->set_flashdata(
    //             'message', '<div class="alert alert-success" role="alert"> Barang Baru berhasil <b>ditambahkan!</b></div>'
    //         );
    //         redirect('barang');
    //     }
        
    // }

    // public function deleteBarang($id_barang)
    // {
    //     $this->Barang_model->deleteDataBarang($id_barang);
    //     $this->session->set_flashdata(
    //         'message',
    //         '<div class="alert alert-success" role="alert"> Data Barang berhasil <b>dihapus!</b></div>'
    //     );
    //     redirect('barang');
    // }

    // public function editBarang($id_barang)
    // {
    //     $this->load->library('../controllers/hillcipher');
    //     $data['title'] = 'Edit Data Barang';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['barang'] = $this->Barang_model->getBarangById($id_barang);
    //     $data['satuan'] = $this->Barang_model->getAllSatuan1();
    //     $data['supplier'] = $this->Barang_model->getAllSupplier1();
        
    //     $data['barang']['nama_barang'] = $this->hillcipher->decrypt($data['barang']['nama_barang']);


    //     $this->form_validation->set_rules('id_barang', 'Kode Barang', 'required');
    //     $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    //     $this->form_validation->set_rules('id_satuan', 'Satuan', 'required');
    //     $this->form_validation->set_rules('stok', 'Stok', 'required');
    //     $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
    //     $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');


    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('databarang/editbarang', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $this->Barang_model->editDataBarang();
    //         $this->session->set_flashdata(
    //             'message', '<div class="alert alert-success" role="alert"> Data Barang berhasil <b>diedit!</b></div>'
    //         );
    //         redirect('barang');
    //     }
    // }
}