<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PendaftaranCTRL extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('be/SakinahMDL', 'Sakinah');
		$this->load->model('fe/PendaftaranMDL', 'Daftar');
	}

	public function index(){
		$data['judul'] = "Formulir Pendaftaran";
		$data['ProfileSK'] 	=  $this->Sakinah->profile_sekolah();
		$data['NoDaftar'] 	=  $this->Daftar->NoPendaftaran();
		$data['nav_menu'] = "Pendaftaran";
		$data['content'] = $this->load->view('fe/pendaftaran/pendaftaran',$data,true);
		$this->load->view('templates/fe/fepage/index',$data);
	}

	function DaftarSantriBaru(){

		$tbl 	= 't_datappdb';

		$data = array (
			'datappdb_id' 	  	=> $this->input->post('nodaftar'), 
			'nisn' 				=> $this->input->post('nisn'),
			'nama_lengkap' 		=> $this->input->post('nama'),
			'password' 			=> md5($this->input->post('tgl_lahir')),
			'tempat_lahir' 		=> $this->input->post('tempat'), 
			'tgl_lahir'  		=> $this->input->post('tgl_lahir'),
			'usia'     			=> $this->input->post('usia'),
			'jenis_kelamin'     => $this->input->post('jkel'),
			'nik_ayah'   		=> $this->input->post('nik_ayah'),
			'nama_ayah'      	=> $this->input->post('nama_ayah'),
			'pekerjaan_ayah'    => $this->input->post('pekerjaan_ayah'),
			'nik_ibu'   		=> $this->input->post('nik_ibu'),
			'nama_ibu'      	=> $this->input->post('nama_ibu'),
			'pekerjaan_ibu'    	=> $this->input->post('pekerjaan_ibu'),
			'nama_wali'      	=> $this->input->post('nama_wali'),
			'no_hp'     		=> $this->input->post('no_hp'), 
			'status_datappdb'   => 1
		);
		$this->Daftar->insertTable($tbl,$data);
	}

}