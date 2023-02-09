<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Submenu_model');
        $this->load->library('form_validation');
        // is_logged_in();
    }

    public function subMenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['user_sub_menu'] = $this->Submenu_model->getAllSubMenu();

        // $this->load->model('Menu_model', 'menu');

        // $data['subMenu'] = $this->menu->getSubMenu();
        // $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('submenu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Submenu_model->addSubMenu();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
    New Sub menu added!</div>'
            );
            redirect('submenu');
        }
    }

    public function deleteSubMenu($id)
    {
        $this->Submenu_model->deleteDataSubMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Menu has been deleted!</div>');
        redirect('submenu');
    }

    public function editSubMenu($id)
    {
        $data['title'] = 'Edit Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // $data['menu'] = $this->db->get('user_menu')->result_array();
        // $data['menu'] = $this->Menu_model->getAllMenu();

        // $this->load->model('Menu_model', 'menu');

        // $data['subMenu'] = $this->menu->getSubMenu();
        // $data['subMenu'] = $this->db->get('user_sub_menu')->result_array();
        // $data['subMenu'] = $this->Menu_model->getSubMenuById($id);

        $data['user_sub_menu'] = $this->Submenu_model->getSubMenuById($id);

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editsubmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Submenu_model->editDataSubMenu();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
    New Sub menu added!</div>'
            );
            redirect('submenu');
        }
    }
}
