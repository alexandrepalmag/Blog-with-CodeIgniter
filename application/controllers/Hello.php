<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {

	public function index()
	{
        $dados['mensagem']='Hello PHP';
		$this->load->view('hello', $dados);
	}
}
