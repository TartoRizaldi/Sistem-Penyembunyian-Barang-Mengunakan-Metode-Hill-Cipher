<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{
    public function index()
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 587,
            'smtp_user' => 'abdulbaari1903@gmail.com',
            'smtp_pass' => 'B4di060621*',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('abdulbaari1903@gmail.com', 'bari');
        $this->email->to('abproject28@gmail.com');
        $this->email->subject('test email');
        $this->email->message('ini email pertama saya');

        return $this->email->send();
    }
}