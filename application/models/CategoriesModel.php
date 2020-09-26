<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoriesModel extends CI_Model{

    public $id;
    public $title;

    public function __construct()
    {
        parent::__construct();
    }

    public function listCategories() {
        $this->db->order_by('title', 'ASC');
        return $this->db->get('category')->result();
    }

    public function title_list($id) {
        $this->db->from('category');
        $this->db->where('id='.$id);
        return $this->db->get()->result();
    }

}
