<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsersModel extends CI_Model
{

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

    public function author_list($id)
    {
        $this->db->select('id, name, historic, img');
        $this->db->from('user');
        $this->db->where('id=' . $id);
        return $this->db->get()->result();
    }

    public function list_authors()
    {
        $this->db->select('id, name, img');
        $this->db->from('user');
        $this->db->order_by('name', 'ASC');
        return $this->db->get()->result();
    }

    
    /* Receive data that is sent from the "Category Name"
form found in the category.php file */
public function add($name,$email,$historic,$user,$password)
{
    $datas['name'] = $name;
    $datas['email'] = $email;
    $datas['historic'] = $historic;
    $datas['user'] = $user;
    $datas['password'] = md5($password);

    return $this->db->insert('user', $datas);
}

/* method to delete a category in database
    deleteCategory
    Receive data that is sent from the "Category Name"
    form found in the Category.php file*/
    public function delete($id){
        $this->db->where('md5(id)',$id);
        return $this->db->delete('user');
    }

    public function listUser($id)
    {
        $this->db->select('id, name, historic,email,user');
        $this->db->from('user');
        $this->db->where('md5(id)',$id);
        return $this->db->get()->result();
    }

    public function updateUser($name, $email, $historic, $user, $password, $id)
    {
        $datas['name']=$name;
        $datas['email']=$email;
        $datas['historic']=$historic;
        $datas['user']=$user;
        $datas['password']=md5($password);
        $this->db->where('id',$id);
        return $this->db->update('user',$datas);
    }

}
