<?php

class BerandaCTRL extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('be/SakinahMDL', 'Sakinah');
	}

	function index()
	{
		if ($this->session->userdata('logged_in') == FALSE) {
			redirect(base_url());
		}

		$data['judul'] 		= "Beranda Santri";
		$data['nav_menu'] 	= "BerandaSantri";
		$data['pengajar'] = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
		$data['content'] 	= $this->load->view('santri/beranda/beranda', $data, true);
		$this->load->view('templates/santri/index', $data);
	}
}
