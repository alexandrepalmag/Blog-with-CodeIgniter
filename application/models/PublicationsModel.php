<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PublicationsModel extends CI_Model
{

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

    public function highlightsHome()
    {
        $this->db->select('user.id as idauthor, user.name, posts.id, posts.title, posts.subtitle, posts.user, posts.date, posts.img');
        $this->db->from('posts');
        $this->db->join('user', 'user.id = posts.user');
        $this->db->limit(4);
        $this->db->order_by('posts.date', 'DESC');
        return $this->db->get()->result();
    }

    public function category_post($id)
    {
        $this->db->select('user.id as idauthor, user.name, posts.id, posts.title, posts.subtitle, posts.user, posts.date, posts.img,
        posts.category');
        $this->db->from('posts');
        $this->db->join('user', 'user.id = posts.user');
        $this->db->where('posts.category = '.$id);
        $this->db->order_by('posts.date', 'DESC');
        return $this->db->get()->result();
    }

    public function publication($id)
    {
        $this->db->select('user.id as idauthor, user.name, posts.id, posts.title, posts.subtitle, posts.user, posts.date, posts.img,
        posts.category, posts.content');
        $this->db->from('posts');
        $this->db->join('user', 'user.id = posts.user');
        $this->db->where('posts.id = '.$id);
        return $this->db->get()->result();
    }

    public function title_list($id) {
        $this->db->select('id,title');
        $this->db->from('posts');
        $this->db->where('id='.$id);
        return $this->db->get()->result();
    }

}
