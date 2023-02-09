<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->library('form_validation');
        // is_logged_in();
    }

    public function admin_box()
	{
        $data['admin'] = [
            [
                'box' 		=> 'light-blue',
				'total' 	=> $this->dashboard->total('barang'),
				'title'		=> 'Barang',
				'icon'		=> 'fa-solid fa-box'
            ],
            [
                'box' 		=> 'olive',
				'total' 	=> $this->dashboard->total('supplier'),
				'title'		=> 'Supplier',
				'icon'		=> 'building-o'
            ],
            [
                'box' 		=> 'yellow-active',
				'total' 	=> $this->dashboard->total('barang_masuk'),
				'title'		=> 'Barang Masuk',
				'icon'		=> 'user-secret'
            ],
            [
                'box' 		=> 'red',
				'total' 	=> $this->dashboard->total('barang_keluar'),
				'title'		=> 'Barang Keluar',
				'icon'		=> 'user'
            ]
        ]
        
        // $this->Menu_model->getAllBox();

		$box = [
			[
				'box' 		=> 'light-blue',
				'total' 	=> $this->dashboard->total('barang'),
				'title'		=> 'Barang',
				'icon'		=> 'graduation-cap'
			],
			[
				'box' 		=> 'olive',
				'total' 	=> $this->dashboard->total('supplier'),
				'title'		=> 'Supplier',
				'icon'		=> 'building-o'
			],
			[
				'box' 		=> 'yellow-active',
				'total' 	=> $this->dashboard->total('barang_masuk'),
				'title'		=> 'Barang Masuk',
				'icon'		=> 'user-secret'
			],
			[
				'box' 		=> 'red',
				'total' 	=> $this->dashboard->total('barang_keluar'),
				'title'		=> 'Barang Keluar',
				'icon'		=> 'user'
			],
		];
		return $info_box;
	}
}
