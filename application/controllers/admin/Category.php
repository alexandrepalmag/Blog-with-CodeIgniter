<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('CategoriesModel', 'modelcategories');
        $this-> categories = $this->modelcategories->listCategories();
    }

    public function index()
    {
        $this->load->library('table');
        $datas['categories'] = $this->categories;
        $datas['title'] = 'Control Panel';
        $datas['subtitle'] = 'Category';
        //end
        $this->load->view('backend/template/html-header', $datas);
        $this->load->view('backend/template/template');
        $this->load->view('backend/category');
        $this->load->view('backend/template/html-footer');
    }

    public function insert() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-category','Category Name',
        'required|min_length[4]|is_unique[category.title]');
        if($this->form_validation->run() == false){
            $this->index();
        }else{
            
        }
    }

}
