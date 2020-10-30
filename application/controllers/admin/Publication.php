<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publication extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //Protection of administration pages.
        if (!$this->session->userdata('loggedInUser')) {
            redirect(base_url('admin/login'));
        }
        $this->load->model('CategoriesModel', 'modelcategories');
        $this->load->model('publicationsmodel', 'modelpublication');
        $this->categories = $this->modelcategories->listCategories();
    }

    public function index()
    {
        $this->load->library('table');
        $datas['categories'] = $this->categories;
        $datas['publications'] = $this->modelpublication->listpublications();
        $datas['title'] = 'Control Panel';
        $datas['subtitle'] = 'Publication';
        //end
        $this->load->view('backend/template/html-header', $datas);
        $this->load->view('backend/template/template');
        $this->load->view('backend/publication');
        $this->load->view('backend/template/html-footer');
    }

    public function insert()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'txt-title',
            'Title',
            'required|min_length[4]'
        );
        $this->form_validation->set_rules(
            'txt-subtitle',
            'Subtitle',
            'required|min_length[4]'
        );
        $this->form_validation->set_rules(
            'txt-content',
            'Content',
            'required|min_length[20]'
        );
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $title = $this->input->post('txt-title');
            $subtitle = $this->input->post('txt-subtitle');
            $content = $this->input->post('txt-content');
            $datepub = $this->input->post('txt-date');
            $category = $this->input->post('select-category');
            $userpub = $this->input->post('txt-user');
            if ($this->modelpublication->add($title, $subtitle, $content, $datepub, $category, $userpub)) {
                redirect(base_url('admin/publication'));
            } else {
                echo "It was not possible to register the category. Try again!";
            }
        }
    }

    //method to delete a category in database
    public function delete($id)
    {
        if ($this->modelpublication->delete($id)) {
            redirect(base_url('admin/publication'));
        } else {
            echo "It was not possible to delete the category. Try again!";
        }
    }

    public function change($id)
    {   //copied from the index () method
        $this->load->library('table');
        $datas['categories'] = $this->modelcategories->listCategories($id);
        $datas['publications'] = $this->modelpublication->listpublications($id);
        $datas['title'] = 'Control Panel';
        $datas['subtitle'] = 'Publication';
        //end
        $this->load->view('backend/template/html-header', $datas);
        $this->load->view('backend/template/template');
        $this->load->view('backend/change-publication');
        $this->load->view('backend/template/html-footer');
    }

    public function saveEditions()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'txt-category',
            'Category Name',
            'required|min_length[4]|is_unique[category.title]'
        );
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $title = $this->input->post('txt-category');
            $id = $this->input->post('txt-id');
            if ($this->modelcategories->update($title, $id)) {
                redirect(base_url('admin/category'));
            } else {
                echo "It was not possible update the category. Try again!";
            }
        }
    }
}
