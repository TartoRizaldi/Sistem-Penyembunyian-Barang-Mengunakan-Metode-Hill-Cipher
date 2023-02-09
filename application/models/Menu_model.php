<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function getAllSubMenu()
    {
        $query = "SELECT DISTINCT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` INNER JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                    order by `user_menu`.`id`
                    ";
        // $query = "SELECT DISTINCT `user_menu`.`menu`
        //         from `user_menu` inner join `user_sub_menu`
        //         on `user_menu`.`id` = `user_sub_menu`.`menu_id`
        //         order by `user_sub_menu`.`menu_id`
        //         ";
        return $this->db->query($query)->result_array();
        // $data['menu'] = $this->db->get('user_menu')->result_array();
        // return $this->db->get('user_menu')->result_array();
    }

    public function getAllMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function addDataMenu()
    {
        $data = ['menu' => $this->input->post('menu', true)];
        $this->db->insert('user_menu', $data);
    }

    public function deleteDataMenu($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
    }

    public function editDataMenu()
    {
        $data = [
            'id' => $this->input->post('id', true),
            'menu' => $this->input->post('menu', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    // public function addDataSubMenu()
    // {
    //     $data = [
    //         'title' => $this->input->post('title', true),
    //         'menu_id' => $this->input->post('menu_id', true),
    //         'url' => $this->input->post('url', true),
    //         'icon' => $this->input->post('icon', true)
    //         'is_active' => $this->input->post('is_active', true)
    //     ];
    //     $this->db->insert('user_sub_menu', $data);
    // }

    public function getSubMenu()
    {
        // $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
        // FROM `user_sub_menu` JOIN `user_menu`
        // ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";

        // return $this->db->query($query)->result_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
    }

    public function getSubMenuById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }

    public function deleteDataSubMenu($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }

    public function editDataSubMenu()
    {
        $data = [
            'id' => $this->input->post('id', true),
            'title' => $this->input->post('title', true),
            'menu_id' => $this->input->post('menu_id', true),
            'url' => $this->input->post('url', true),
            'icon' => $this->input->post('icon', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
    }

    // public function getAllMenu()
    // {
    //     // $data['menu'] = $this->db->get('user_menu')->result_array();
    //     return $this->db->get('user_menu')->result_array();
    // }

    // public function addDataMenu()
    // {
    //     $data = [
    //         'menu' => $this->input->post('menu')
    //     ];

    //     $this->db->insert('user_menu', $data);
    // }

    // public function deleteDataMenu($id)
    // {
    //     $this->db->delete('user_menu', ['id' => $id]);
    // }

    // public function getMenuById($id)
    // {
    //     return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    // }

    // public function editDataMenu()
    // {
    //     $data = [
    //         'menu' => $this->input->post('menu')
    //     ];

    //     $this->db->where('id', $this->input->post('id'));
    //     $this->db->update('user_menu', $data);
    // }

    // public function addDataSubMenu()
    // {
    //     $data = [
    //         'title' => $this->input->post('title'),
    //         'menu_id' => $this->input->post('menu_id'),
    //         'url' => $this->input->post('url'),
    //         'icon' => $this->input->post('icon'),
    //         'is_active' => $this->input->post('is_active')
    //     ];

    //     $this->db->insert('user_sub_menu', $data);
    // }

    // public function deleteDataSubMenu($id)
    // {
    //     $this->db->delete('user_sub_menu', ['id' => $id]);
    // }

    // public function getSubMenuById($id)
    // {
    //     return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    // }

    // public function editDataSubMenu()
    // {
    //     $data = [
    //         'title' => $this->input->post('title'),
    //         'menu_id' => $this->input->post('menu_id'),
    //         'url' => $this->input->post('url'),
    //         'icon' => $this->input->post('icon'),
    //         'is_active' => $this->input->post('is_active')
    //     ];

    //     $this->db->where('id', $this->input->post('id'));
    //     $this->db->update('user_sub_menu', $data);
    // }

    // public function getAllSubMenu()
    // {
    //     $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
    //     FROM `user_sub_menu` JOIN `user_menu`
    //     ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";

    //     return $this->db->query($query)->result_array();
    // }

    // public function addDataSubMenu()
    // {
    //     $data = [
    //         'title' => $this->input->post('title'),
    //         'menu_id' => $this->input->post('menu_id'),
    //         'url' => $this->input->post('url'),
    //         'icon' => $this->input->post('icon'),
    //         'is_active' => $this->input->post('is_active')
    //     ];

    //     $this->db->insert('user_sub_menu', $data);
    // }

    // public function deleteDataSubMenu($id)
    // {
    //     $this->db->delete('user_sub_menu', ['id' => $id]);
    // }

    // public function getSubMenuById($id)
    // {
    //     return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    // }

    // public function editDataSubMenu()
    // {
    //     $data = [
    //         'title' => $this->input->post('title'),
    //         'menu_id' => $this->input->post('menu_id'),
    //         'url' => $this->input->post('url'),
    //         'icon' => $this->input->post('icon'),
    //         'is_active' => $this->input->post('is_active')
    //     ];

    //     $this->db->where('id', $this->input->post('id'));
    //     $this->db->update('user_sub_menu', $data);
    // }
}
