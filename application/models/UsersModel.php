<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsersModel extends CI_Model{

    public $id;
    public $name;
    public $email;
    public $img;
    public $historic;
    public $user;
    public $npassword;

    public function __construct()
    {
        parent::__construct();
    }

    public function author_list($id) {
        $this->db->select('id, name, historic, img');
        $this->db->from('user');
        $this->db->where('id='.$id);
        return $this->db->get()->result();
    }

}
