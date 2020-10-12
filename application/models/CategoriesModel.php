<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoriesModel extends CI_Model
{

    public $id;
    public $title;

    public function __construct()
    {
        parent::__construct();
    }

    public function listCategories()
    {
        $this->db->order_by('title', 'ASC');
        return $this->db->get('category')->result();
    }

    public function title_list($id)
    {
        $this->db->from('category');
        $this->db->where('id=' . $id);
        return $this->db->get()->result();
    }

    /* Receive data that is sent from the "Category Name"
form found in the category.php file */
    public function addCategory($title)
    {
        $datas['title'] = $title;
        return $this->db->insert('category', $datas);
    }

    /* method to delete a category in database
    deleteCategory
    Receive data that is sent from the "Category Name"
    form found in the Category.php file*/
    public function deleteCategory($id){
        $this->db->where('md5(id)',$id);
        return $this->db->delete('category');
    }
}
