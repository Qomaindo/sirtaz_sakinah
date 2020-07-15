<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SejarahController extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('be/SakinahMDL', 'Sakinah');

  //   if ($this->session->userdata('logged_in')==0) {
		// 	redirect(base_url());
		// }
	}

	public function index(){
		$data['judul'] = "Sejarah Sekolah";
		$data['nav_menu'] = "Sejarah";
		$data['ProfileSK'] 	=  $this->Sakinah->profile_sekolah();
		$data['content'] = $this->load->view('fe/sejarah/sejarah',$data,true);
		$this->load->view('templates/fe/fepage/index',$data);
	}
}