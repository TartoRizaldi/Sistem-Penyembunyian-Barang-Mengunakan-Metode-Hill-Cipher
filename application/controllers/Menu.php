<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_menu'] = $this->Menu_model->getAllMenu();

        // $this->form_validation->set_rules('menu', 'Menu', 'required');

        // if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
        // } else {
        //     $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Baru Ditambahkan!</div>');
        //     redirect('menu');
        // }
    }

    public function addMenu()
    {
        $data['title'] = 'Form Tambah Menu';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/addmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->addDataMenu();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Menu Baru <b>Ditambahkan!</b></div>'
            );
            redirect('menu');
        }
    }

    public function deleteMenu($id)
    {
        $this->Menu_model->deleteDataMenu($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Menu telah <b>Dihapus!</b></div>'
        );
        redirect('menu');
    }

    public function editMenu($id)
    {
        $data['title'] = 'Form Edit Menu';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_menu'] = $this->Menu_model->getMenuById($id);

        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->editDataMenu();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Menu telah <b>Diedit!</b></div>'
            );
            redirect('menu');
        }
    }

    public function subMenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_sub_menu'] = $this->Menu_model->getAllSubMenu();

        // $this->form_validation->set_rules('title', 'Title', 'required');
        // $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        // $this->form_validation->set_rules('url', 'URL', 'required');
        // $this->form_validation->set_rules('icon', 'Icon', 'required');

        // if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer');
        // } else {
        //     $this->Menu_model->addDataSubMenu();
        //     $this->session->set_flashdata(
        //         'message',
        //         '<div class="alert alert-success" role="alert"> Sub Menu telah <b>Ditambahkan!</b></div>'
        //     );
        //     redirect('menu/submenu');
        // }
    }

    public function addSubMenu()
    {
        $data['title'] = 'Form Tambah Sub Menu';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_sub_menu'] = $this->Menu_model->getAllSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/addsubmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            // $this->Menu_model->addDataSubMenu();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Sub Menu Baru <b>Ditambahkan!</b></div>');
            redirect('menu/submenu');
        }
    }

    public function editSubMenu($id)
    {
        $data['title'] = 'Form Edit Sub Menu';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user_sub_menu'] = $this->Menu_model->getSubMenuById($id);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editsubmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->editDataSubMenu();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Sub Menu telah <b>Diedit!</b></div>'
            );
            redirect('menu/submenu');
        }
    }

    public function deleteSubMenu($id)
    {
        $this->Menu_model->deleteDataSubMenu($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert"> Menu telah <b>Dihapus!</b></div>'
        );
        redirect('menu/submenu');
    }

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('Menu_model');
    //     $this->load->library('form_validation');
    //     is_logged_in();
    // }

    // public function index()
    // {
    //     $data['title'] = 'Menu Management';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    //     // $data['menu'] = $this->Menu_model->getAllMenu();
    //     $data['user_menu'] = $this->Menu_model->getAllMenu();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('menu/index', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function addMenu()
    // {
    //     $data['title'] = 'Form Tambah Menu';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    //     $this->form_validation->set_rules('menu', 'Menu', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('menu/addmenu', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $this->Menu_model->addDataMenu();
    //         $this->session->set_flashdata(
    //             'message',
    //             '<div class="alert alert-success" role="alert">
    //         Menu baru berhasil ditambahkan!</div>'
    //         );
    //         redirect('menu');
    //     }
    // }

    // public function deleteMenu($id)
    // {
    //     $this->Menu_model->deleteDataMenu($id);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //     Menu berhasil dihapus!</div>');
    //     redirect('menu');
    // }

    // public function editMenu($id)
    // {
    //     $data['title'] = 'Form Edit Menu';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    //     $data['user_menu'] = $this->Menu_model->getMenuById($id);

    //     // $data['menu'] = $this->Menu_model->getMenuById($id);

    //     $this->form_validation->set_rules('menu', 'Menu', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('menu/editmenu', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $this->Menu_model->editDataMenu();
    //         $this->session->set_flashdata(
    //             'message',
    //             '<div class="alert alert-success" role="alert">
    //         Menu berhasil diupdate!</div>'
    //         );
    //         redirect('menu');
    //     }
    // }

    // public function subMenu()
    // {
    //     $data['title'] = 'Sub Menu Management';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    //     // $data['menu'] = $this->db->get('user_menu')->result_array();
    //     $data['user_sub_menu'] = $this->Menu_model->getAllSubMenu();

    //     // $this->load->model('Menu_model', 'menu');

    //     // $data['subMenu'] = $this->menu->getSubMenu();
    //     // $data['menu'] = $this->db->get('user_menu')->result_array();

    //     $this->form_validation->set_rules('title', 'Title', 'required');
    //     $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    //     $this->form_validation->set_rules('url', 'URL', 'required');
    //     $this->form_validation->set_rules('icon', 'Icon', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('menu/submenu', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $this->Menu_model->addSubMenu();
    //         $this->session->set_flashdata(
    //             'message',
    //             '<div class="alert alert-success" role="alert">
    // New Sub menu added!</div>'
    //         );
    //         redirect('menu/submenu');
    //     }
    // }

    // public function deleteSubMenu($id)
    // {
    //     $this->Menu_model->deleteDataSubMenu($id);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    // Menu has been deleted!</div>');
    //     redirect('menu/submenu');
    // }

    // public function editSubMenu($id)
    // {
    //     $data['title'] = 'Edit Sub Menu Management';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    //     // $data['menu'] = $this->db->get('user_menu')->result_array();
    //     // $data['menu'] = $this->Menu_model->getAllMenu();

    //     // $this->load->model('Menu_model', 'menu');

    //     // $data['subMenu'] = $this->menu->getSubMenu();
    //     // $data['subMenu'] = $this->db->get('user_sub_menu')->result_array();
    //     // $data['subMenu'] = $this->Menu_model->getSubMenuById($id);

    //     $data['user_sub_menu'] = $this->Menu_model->getSubMenuById($id);

    //     $this->form_validation->set_rules('title', 'Title', 'required');
    //     $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    //     $this->form_validation->set_rules('url', 'URL', 'required');
    //     $this->form_validation->set_rules('icon', 'Icon', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('menu/editsubmenu', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $this->Menu_model->editDataSubMenu();
    //         $this->session->set_flashdata(
    //             'message',
    //             '<div class="alert alert-success" role="alert">
    // New Sub menu added!</div>'
    //         );
    //         redirect('submenu');
    //     }
    // }
}
