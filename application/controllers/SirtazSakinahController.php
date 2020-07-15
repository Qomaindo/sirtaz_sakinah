<?php
class SirtazSakinahController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('be/SakinahMDL', 'Sakinah');
	}

	// function index(){

	// 	$data['judul'] 		= "Beranda";
	// 	$data['nav_menu'] 	= "Beranda";
	// 	$data['jmlUser'] 	=  $this->Sakinah->jmlUser();
	// 	$data['jmlKelas'] 	=  $this->Sakinah->jmlKelas();
	// 	$data['jmlSantri'] 	=  $this->Sakinah->jmlSantri();
	// 	$data['jmlSantriBaru'] 	=  $this->Sakinah->jmlSantriBaru();
	// 	$data['jmlPengajar'] 	=  $this->Sakinah->jmlPengajar();
	//   		$data['content'] 	= $this->load->view('be/beranda/berandamanajemen',$data,true);
	// 	$this->load->view('templates/be/index', $data);
	// }


	function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			redirect(base_url("be/beranda/BerandaController"));
		}
		$data['judul'] 		= "Login Pengguna";
		$this->load->view('be/pengguna/login', $data);
	}


	function TakeLogin()
	{
		$data = array(
			'username' => $this->input->post('username', TRUE),
			'password' => md5($this->input->post('password', TRUE))
		);
		$result = $this->Sakinah->check_user($data);
		// var_dump($result);
		if ($result->num_rows() >= 1) {
			foreach ($result->result() as $sess) {
				$sess_data['logged_in'] = TRUE;
				$sess_data['user_id'] = $sess->user_id;
				$sess_data['guru_id'] = $sess->guru_id;
				$sess_data['nip'] = $sess->nip;
				$sess_data['role_code'] = $sess->role_code;
				$this->session->set_userdata($sess_data);
			}
			redirect(base_url("be/beranda/BerandaController"));

			// print_r($sess_data);
		} else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}


	function LogOut()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('guru_id');
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('role_code');
		$this->session->sess_destroy();
		redirect(base_url() . 'SirtazSakinahController');
	}
}
