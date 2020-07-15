<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('be/SakinahMDL', 'Sakinah');
		$this->load->model('fe/FrontEndMDL', 'FE');
		$this->load->model('fe/PendaftaranMDL', 'Daftar');
	}

	public function index(){
		$data['judul'] = "Halaman Login Santri";
		$data['ProfileSK'] 	=  $this->Sakinah->profile_sekolah();
		$data['nav_menu'] = "Login";
		// $data['content'] = $this->load->view('fe/login/login',$data,true);
		$this->load->view('fe/login/login',$data);
	}
	

	function TakeLogin(){
		$data = array('datappdb_id' => $this->input->post('username', TRUE),
									'password' => md5($this->input->post('password', TRUE))
		);
		$result = $this->FE->check_user($data);
		// var_dump($result);
		if ($result->num_rows() >= 1) {
			foreach ($result->result() as $sess) {
				$sess_data['logged_in'] = TRUE;
				$sess_data['datappdb_id'] = $sess->datappdb_id;
				$sess_data['nisn'] = $sess->nisn;
				$sess_data['nama_lengkap'] = $sess->nama_lengkap;
				$this->session->set_userdata($sess_data);
			}
				redirect(base_url("santri/beranda/BerandaCTRL"));

		// print_r($sess_data);
		} else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

	function LogOut(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('datappdb_id');
		$this->session->unset_userdata('nisn');
		$this->session->unset_userdata('nama_lengkap');
		$this->session->sess_destroy();
		redirect(base_url('login/ppdb'));
	}
	

}