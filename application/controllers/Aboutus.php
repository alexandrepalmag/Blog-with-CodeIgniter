<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aboutus extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('CategoriesModel', 'modelcategories');
        $this-> categories = $this->modelcategories->listCategories();
    }

    public function index($id, $slug=null)
    {
        $datas['categories'] = $this->categories;
        $this->load->model('publicationsmodel', 'modelhighlights');
        $datas['posts'] = $this->modelhighlights->category_post($id);
        //data that will be sent to the header
        $datas['title'] = 'Categories';
        $datas['subtitle'] = '';
        //end
        $datas['subtitledb'] = $this->modelcategories->title_list($id);
        $this->load->view('frontend/template/html-header', $datas);
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/category');
        $this->load->view('frontend/template/aside');
        $this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
    }

    public function authors($id, $slug=null) {
        $datas['categories'] = $this->categories;
        $this->load->model('usersmodel', 'modelusers');
        $datas['authors'] = $this->modelusers->author_list($id);
        
        //data that will be sent to the header
        $datas['title'] = 'About Us';
        $datas['subtitle'] = '';
        //end
        $this->load->view('frontend/template/html-header', $datas);
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/author');
        $this->load->view('frontend/template/aside');
        $this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
    }
}
