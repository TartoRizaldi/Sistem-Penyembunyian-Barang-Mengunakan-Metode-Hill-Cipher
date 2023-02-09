<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporansupplier_model extends CI_model 
{
    public function getAllSupplier()
    {
        return $this->db->get('supplier')->result_array();
    }
}
