<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $datas['title'] = 'Control Panel';
        $datas['subtitle'] = 'Category';
        //end
        $this->load->view('backend/template/html-header', $datas);
        $this->load->view('backend/template/template');
        $this->load->view('backend/category');
        $this->load->view('backend/template/html-footer');
    }
}
