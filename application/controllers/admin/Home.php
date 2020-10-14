<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        //Protection of administration pages.
        if(!$this->session->userdata('loggedInUser')) {
            redirect(base_url('admin/login'));
        }
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
}
