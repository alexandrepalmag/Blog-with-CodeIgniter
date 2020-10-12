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
            $title = $this->input->post('txt-category');
            if($this->modelcategories->addCategory($title)){
                redirect(base_url('admin/category'));
            }else{
                echo "It was not possible to register the category. Try again!";
            }
        }
    }

    //method to delete a category in database
    public function delete($id)
    {
        if($this->modelcategories->deleteCategory($id)){
            redirect(base_url('admin/category'));
        }else{
            echo "It was not possible to delete the category. Try again!";
        }
    }

}
