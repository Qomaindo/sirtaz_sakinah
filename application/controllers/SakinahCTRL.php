<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SakinahCTRL extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('be/SakinahMDL', 'Sakinah');
  //   if ($this->session->userdata('logged_in')==0) {
		// 	redirect(base_url());
		// }
	}

	public function index(){
		$data['judul'] = "Sistem Informasi Sekolah";
		$data['ProfileSK'] 	=  $this->Sakinah->profile_sekolah();
		$data['KelasTPQ'] 	=  $this->Sakinah->KelasTPQ();
		$data['KelasTKQ'] 	=  $this->Sakinah->KelasTKQ();
		$data['KelasTahfidz'] 	=  $this->Sakinah->KelasTAHFIDZ();
		$data['Informasi'] 	=  $this->Sakinah->Informasi();
		$data['Berita'] 	=  $this->Sakinah->Berita();
		$data['nav_menu'] = "Beranda";
		$data['content'] = $this->load->view('fe/home/beranda',$data,true);
		$this->load->view('templates/fe/index',$data);
	}

	public function KontakKami(){
		$data['judul'] = "Kontak Kami";
		$data['ProfileSK'] 	=  $this->Sakinah->profile_sekolah();
		$data['nav_menu'] = "Kontak";
		$data['content'] = $this->load->view('fe/kontakkami/kontak_kami',$data,true);
		$this->load->view('templates/fe/fepage/index',$data);
	}

	function SendKontakKami(){

		$tbl 	= 't_kontakkami';
		$tanggal = date("Ymd");
		$data = array (
			'judul_kontak' 	  	=> $this->input->post('judul'), 
			'tgl_kontak' 		=> $tanggal, 
			'nama_pengirim'  	=> $this->input->post('nama'), 
			'email_pengirim'   	=> $this->input->post('email'),
			'nohp_pengirim'     => $this->input->post('nohp'), 
			'deskripsi_kontak' 	=> $this->input->post('pesan')
		);
		$this->Sakinah->insertTable($tbl,$data);
	}

	public function StrukturOrganisasi(){
		$data['judul'] = "Struktur Organisasi";
		$data['ProfileSK'] 	=  $this->Sakinah->profile_sekolah();
		$data['nav_menu'] = "StrukturOrganisasi";
		$data['content'] = $this->load->view('fe/strukturorganisasi/struktur_organisasi',$data,true);
		$this->load->view('templates/fe/fepage/index',$data);
	}

}