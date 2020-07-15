<?php

class BerandaController extends CI_Controller
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

		$data['judul'] 		= "Beranda";
		$data['nav_menu'] 	= "Beranda";
		$data['jmlUser'] 	=  $this->Sakinah->jmlUser();
		$data['jmlKelas'] 	=  $this->Sakinah->jmlKelas();
		$data['jmlSantri'] 	=  $this->Sakinah->jmlSantri();
		$data['jmlSantriBaru'] 	=  $this->Sakinah->jmlSantriBaru();
		$data['jmlPengajar'] 	=  $this->Sakinah->jmlPengajar();
		$data['ProfileSK'] 	=  $this->Sakinah->profile_sekolah();
		$data['DataInformasi'] 	=  $this->Sakinah->Informasi();
		$data['pengajar'] = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
		if ($this->session->userdata('role_code') == 'MNJM') {
			$data['content'] 	= $this->load->view('be/beranda/berandamanajemen', $data, true);
		} else if ($this->session->userdata('role_code') == 'PGJR') {
			$data['content'] 	= $this->load->view('be/beranda/berandapengajar', $data, true);
		} else { }
		// $data['content'] 	= $this->load->view('be/beranda/berandamanajemen', $data, true);
		$this->load->view('templates/be/index', $data);
	}
}
