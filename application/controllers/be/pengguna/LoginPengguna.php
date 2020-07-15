<?php
class LoginPengguna extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){

		$data['judul'] 		= "Login Pengguna";
   		$this->load->view('be/pengguna/login', $data);
	}
}