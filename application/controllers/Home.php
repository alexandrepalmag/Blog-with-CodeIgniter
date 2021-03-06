<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('CategoriesModel', 'modelcategories');
        $this-> categories = $this->modelcategories->listCategories();
    }

    public function index()
    {
        $datas['categories'] = $this->categories;
        $this->load->model('publicationsmodel', 'modelhighlights');
        $datas['posts'] = $this->modelhighlights->highlightsHome();
        //data that will be sent to the header
        $datas['title'] = 'Home Page';
        $datas['subtitle'] = 'Recent Posts';
        //end
        $this->load->view('frontend/template/html-header', $datas);
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/home');
        $this->load->view('frontend/template/aside');
        $this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
    }
}
