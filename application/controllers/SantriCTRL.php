<?php
class SirtazSakinahController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){

		$data['judul'] 		= "Beranda";
		$data['nav_menu'] 	= "Beranda";
   		$data['content'] 	= $this->load->view('be/beranda/beranda',$data,true);
		$this->load->view('templates/be/index', $data);
	}
}