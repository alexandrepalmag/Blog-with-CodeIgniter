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
            $this->db->where('password', $password);
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
