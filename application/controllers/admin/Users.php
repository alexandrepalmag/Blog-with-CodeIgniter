<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //Protection of administration pages.
        if (!$this->session->userdata('loggedInUser')) {
            redirect(base_url('admin/login'));
        }

        $this->load->library('table');
        $this->load->model('UsersModel', 'modelusers');

        $datas['users'] = $this->modelusers->list_authors();
        
        $datas['title'] = 'Control Panel';
        $datas['subtitle'] = 'Users';
        //end
        $this->load->view('backend/template/html-header', $datas);
        $this->load->view('backend/template/template');
        $this->load->view('backend/users');
        $this->load->view('backend/template/html-footer');
    }
//methods to edit datas user
    public function insert()
    {
        //Protection of administration pages.
        if (!$this->session->userdata('loggedInUser')) {
            redirect(base_url('admin/login'));
        }
        $this->load->model('UsersModel', 'modelusers');
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'txt-name',
            'User Name',
            'required|min_length[3]'
        );
        $this->form_validation->set_rules(
            'txt-email',
            'Email',
            'required|valid_email'
        );
        $this->form_validation->set_rules(
            'txt-historic',
            'Historic',
            'required|min_length[18]'
        );
        $this->form_validation->set_rules(
            'txt-user',
            'User',
            'required|min_length[3]|is_unique[user.user]'
        );
        $this->form_validation->set_rules(
            'txt-password',
            'Password',
            'required|min_length[4]'
        );
        $this->form_validation->set_rules(
            'txt-confirmPassword',
            'Confirm Password',
            'required|matches[txt-password]'
        );
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $name = $this->input->post('txt-name');
            $email = $this->input->post('txt-email');
            $historic = $this->input->post('txt-historic');
            $user = $this->input->post('txt-user');
            $password = $this->input->post('txt-password');
            if ($this->modelusers->add($name,$email,$historic,$user,$password)) {
                redirect(base_url('admin/users'));
            } else {
                echo "It was not possible to register the category. Try again!";
            }
        }
    }

    //method to delete a user in database
    public function delete($id)
    {
        $this->load->model('UsersModel', 'modelusers');
        //Protection of administration pages.
        if (!$this->session->userdata('loggedInUser')) {
            redirect(base_url('admin/login'));
        }

        if ($this->modelusers->delete($id)) {
            redirect(base_url('admin/users'));
        } else {
            echo "It was not possible to delete the category. Try again!";
        }
    }

    public function change($id)
    {   
        //Protection of administration pages.
        if (!$this->session->userdata('loggedInUser')) {
            redirect(base_url('admin/login'));
        }
        $this->load->model('usersmodel', 'modelusers');
        //copied from the index () method
        $datas['users'] = $this->modelusers->listUser($id);
        $datas['title'] = 'Control Panel';
        $datas['subtitle'] = 'Users';
        //end
        $this->load->view('backend/template/html-header', $datas);
        $this->load->view('backend/template/template');
        $this->load->view('backend/change-users');
        $this->load->view('backend/template/html-footer');
    }

    public function saveEditions()
    {
        //Protection of administration pages.
        if (!$this->session->userdata('loggedInUser')) {
            redirect(base_url('admin/login'));
        }
        
        $this->load->model('UsersModel', 'modelusers');
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

    public function loginPage()
    {
        $datas['title'] = 'Control Panel';
        $datas['subtitle'] = 'Login';
        //end
        $this->load->view('backend/template/html-header', $datas);
        $this->load->view('backend/login');
        $this->load->view('backend/template/html-footer');
    }

    public function login()  
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'txt-user',
            'User Name',
            'required|min_length[4]'
        );
        $this->form_validation->set_rules(
            'txt-password',
            'Password',
            'required|min_length[4]'
        );
        if ($this->form_validation->run() == FALSE) {
            $this->loginPage();
        } else {
            $user = $this->input->post('txt-user');
            $password = $this->input->post('txt-password');
            $this->db->where('user', $user);
            $this->db->where('password', md5($password));
            $loggedInUser = $this->db->get('user')->result();
            if (count($loggedInUser) == 1) {
                $sessionDatas['loggedInUser'] = $loggedInUser[0];
                $sessionDatas['logged'] = TRUE;
                $this->session->set_userdata($sessionDatas);
                redirect(base_url('admin'));
            } else {
                $sessionDatas['loggedInUser'] = NULL;
                $sessionDatas['logged'] = FALSE;
                $this->session->set_userdata($sessionDatas);
                redirect(base_url('admin/login'));
            }
        }
    }

    public function logout()
    {
        $sessionDatas['loggedInUser'] = NULL;
        $sessionDatas['logged'] = FALSE;
        $this->session->set_userdata($sessionDatas);
        redirect(base_url('admin/login'));
    }
}
