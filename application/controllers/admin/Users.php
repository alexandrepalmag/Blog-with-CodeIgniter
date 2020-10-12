<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $datas['title'] = 'Control Panel';
        $datas['subtitle'] = 'Home';
        //end
        $this->load->view('backend/template/html-header', $datas);
        $this->load->view('backend/template/template');
        $this->load->view('backend/home');
        $this->load->view('backend/template/html-footer');
    }

    public function loginPage() {
        $datas['title'] = 'Control Panel';
        $datas['subtitle'] = 'Login';
        //end
        $this->load->view('backend/template/html-header', $datas);
        $this->load->view('backend/login');
        $this->load->view('backend/template/html-footer');
    }

}