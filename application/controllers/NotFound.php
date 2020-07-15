<?php

class NotFound extends CI_Controller
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

		$data['judul'] 		= "Halaman Tidak Ditemukan";
		$data['nav_menu'] 	= "NotFound";
		// $data['DataSantri'] = $this->Sakinah->DataGuru($this->session->userdata('datappdb_id'));
		// $data['content'] 	= $this->load->view('notfound', $data, true);
		$this->load->view('notfound', $data);
	}
}
