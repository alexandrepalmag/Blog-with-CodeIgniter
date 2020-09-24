<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hello extends CI_Controller
{

	public function index()
	{
		$dados['mensagem'] = 'Hello PHP';
		$this->load->view('hello', $dados);
	}
	public function testDB()
	{
		$datas['message'] = $this->db->get('posts')->result();
		echo "<pre>";
		print_r($datas);
	}
}
