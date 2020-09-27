<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publications extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('CategoriesModel', 'modelcategories');
        $this-> categories = $this->modelcategories->listCategories();
    }

    public function index($id, $slug=null)
    {
        $datas['categories'] = $this->categories;
        $this->load->model('publicationsmodel', 'modelpublications');
        $datas['posts'] = $this->modelpublications->publication($id);
        
        //data that will be sent to the header
        $datas['title'] = 'Publication';
        $datas['subtitle'] = '';
        //end
        $datas['subtitledb'] = $this->modelpublications->title_list($id);
        $this->load->view('frontend/template/html-header', $datas);
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/publication');
        $this->load->view('frontend/template/aside');
        $this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
    }
}
