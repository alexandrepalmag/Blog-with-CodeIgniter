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
        $this->db->limit(4);
        $this->db->order_by('date', 'DESC');
        return $this->db->get('posts')->result();
    }

}
