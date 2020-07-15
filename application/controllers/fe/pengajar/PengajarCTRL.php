<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengajarCTRL extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('be/SakinahMDL', 'Sakinah');
  //   if ($this->session->userdata('logged_in')==0) {
		// 	redirect(base_url());
		// }
	}

	public function index(){
		$data['judul'] = "Informasi Pengajar";
		$data['ProfileSK'] 	=  $this->Sakinah->profile_sekolah();
		$data['DataPengajar'] 	=  $this->Sakinah->DataPengajar();
		$data['nav_menu'] = "Pengajar";
		$data['content'] = $this->load->view('fe/pengajar/pengajar',$data,true);
		$this->load->view('templates/fe/fepage/index',$data);
	}
}