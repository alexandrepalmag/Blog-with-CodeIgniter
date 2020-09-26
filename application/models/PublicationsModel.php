<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PublicationsModel extends CI_Model{

    public $id;
    public $category;
    public $title;
    public $subtitle;
    public $content;
    public $date;
    public $img;
    public $user;

    public function __construct()
    {
        parent::__construct();
    }

    public function highlightsHome() {
        $this->db->select('user.id as idauthor, user.name, posts.id, posts.title, posts.subtitle, posts.user, posts.date, posts.img');
        $this->db->from('posts');
        $this->db->join('user', 'user.id = posts.user');
        $this->db->limit(4);
        $this->db->order_by('posts.date', 'DESC');
        return $this->db->get()->result();
    }

}
