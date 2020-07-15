<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InfoBeritaController extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('be/SakinahMDL', 'Sakinah');

  //   if ($this->session->userdata('logged_in')==0) {
		// 	redirect(base_url());
		// }
	}

	public function index(){
		$data['judul'] = "Informasi & Berita";
		$data['nav_menu'] = "InfoBerita";
		$data['Informasi'] 	=  $this->Sakinah->Informasi();
		$data['Berita'] 	=  $this->Sakinah->Berita();
		$data['jmlInfo'] 	=  $this->Sakinah->jmlInformasi();
		$data['jmlBerita'] 	=  $this->Sakinah->jmlBerita();
		$data['ProfileSK'] 	=  $this->Sakinah->profile_sekolah();
		$data['content'] = $this->load->view('fe/info_berita/info_berita',$data,true);
		$this->load->view('templates/fe/fepage/index',$data);
	}

	function detailBerita($id){
		$tbl	= 't_berita';
		$field	= '*';
		$key	= 'berita_id';
		$args	= $id;

		$data['judul'] = "Informasi & Berita";
		$data['nav_menu'] = "InfoBerita";
		$data['DetailBerita'] =  $this->Sakinah->getData($tbl,$field,$key,$args);
		$data['ProfileSK'] 	=  $this->Sakinah->profile_sekolah();
		$data['content'] = $this->load->view('fe/info_berita/detail_berita',$data,true);
		$this->load->view('templates/fe/fepage/index',$data);
	}

	function detailInformasi($id){
		$tbl	= 't_informasi';
		$field	= '*';
		$key	= 'informasi_id';
		$args	= $id;

		$data['judul'] = "Informasi & Berita";
		$data['nav_menu'] = "InfoBerita";
		$data['DetailInfo'] =  $this->Sakinah->getData($tbl,$field,$key,$args);
		$data['ProfileSK'] 	=  $this->Sakinah->profile_sekolah();
		$data['content'] = $this->load->view('fe/info_berita/detail_informasi',$data,true);
		$this->load->view('templates/fe/fepage/index',$data);
	}
}