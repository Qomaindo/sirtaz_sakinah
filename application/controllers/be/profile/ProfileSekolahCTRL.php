<?php
class ProfileSekolahCTRL extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('be/SakinahMDL', 'Sakinah');
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect(base_url());
        }
        
	}

	function index(){

		$data['judul'] 		= "Profile Sekolah";
		$data['nav_menu'] 	= "ProfileSekolah";
		$data['yayasan'] 	=  $this->Sakinah->data_yayasan();
		$data['ProfileSK'] 	=  $this->Sakinah->profile_sekolah();
		// $data['tkq'] 	=  $this->Sakinah->data_tkq();
		// $data['tpq'] 	=  $this->Sakinah->data_tpq();
		// $data['tahfidz'] 	=  $this->Sakinah->data_tahfidz();
   		$data['pengajar'] = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
        $data['content'] 	= $this->load->view('be/profile/profile_sekolah',$data,true);
		$this->load->view('templates/be/index', $data);
		// print_r($data['ProfileSK']);
	}

	function ubahDataYayasan(){
		$data = array();
		$id = $this->input->post('yayasan_id');

		$tbl 	= 't_yayasan';
		$key	= 'yayasan_id';
		$arg	= $id;

		$config = array(
			'upload_path'   => './assets/be/image/yayasan/',
		    'allowed_types' => 'jpg|png|jpeg',
		    'max_size'      => '2048',
		    'encrypt_name'	=> true
		    // 'logoyayasan'   => 'gambar'.time(),
		    // 'logosekolah'   => 'gambar'.time()
		);
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('logoyayasan')){

			// redirect(base_url());
			$error = array('error' => $this->upload->display_errors());

		}else{
			$fileData = $this->upload->data();
    		$data['logo_yayasan'] = $fileData['file_name'];
		}

		if(!$this->upload->do_upload('bgweb')){

			$error = array('error' => $this->upload->display_errors());

		}else{
			$fileData = $this->upload->data();
    		$data['background_web'] = $fileData['file_name'];
		}
		
		$data['no_sk'] 			= $this->input->post('nosk');
		$data['tahun_sk']	 	= $this->input->post('thnsk');
		$data['akta_notaris'] 	= $this->input->post('aktanotaris');
		$data['nama_yayasan'] 	= $this->input->post('yayasanname');
		$data['telfon_yayasan']	= $this->input->post('notelfonyayasan');
		$data['email_yayasan'] 	= $this->input->post('emailyayasan');
		$data['alamat_yayasan']	= $this->input->post('alamatyayasan');

		$this->Sakinah->updateTable($tbl,$key,$arg,$data);
		redirect('be/profile/ProfileSekolahCTRL');
	}

	function ubahDataSekolah(){
		$data = array();
		$id = $this->input->post('sekolah_id');

		$tbl 	= 't_sekolah';
		$key	= 'sekolah_id';
		$arg	= $id;

		$config = array(
			'upload_path'   => './assets/be/image/yayasan/',
		    'allowed_types' => 'jpg|png|jpeg',
		    'max_size'      => '2048',
		    'encrypt_name'	=> true
		    // 'logoyayasan'   => 'gambar'.time(),
		    // 'logosekolah'   => 'gambar'.time()
		);
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('fotosekolah')){

			$error = array('error' => $this->upload->display_errors());

		}else{
			$fileData = $this->upload->data();
    		$data['logo_sekolah'] = $fileData['file_name'];
		}

		if(!$this->upload->do_upload('strukturorganisasi')){

			$error = array('error' => $this->upload->display_errors());

		}else{
			$fileData = $this->upload->data();
    		$data['struktur_organisasi'] = $fileData['file_name'];
		}

		$data['nama_sekolah'] = $this->input->post('namesekolah');
		$data['alamat_sekolah'] = $this->input->post('alamatsekolah');
		$data['thn_pendirian'] = $this->input->post('thnberidiri');
		$data['thn_perizinan'] = $this->input->post('thnperizinan');
		$data['nama_pendiri'] = $this->input->post('nm_pendiri');
		$data['metode_pembelajaran'] = $this->input->post('metodebelajar');
		$data['waktu_pembelajaran'] = $this->input->post('wktpembelajaran');
		$data['visi_sekolah'] = $this->input->post('visisekolah');
		$data['misi_sekolah'] = $this->input->post('misisekolah');
		$data['sejarah_sekolah'] = $this->input->post('sejarahsekolah');
		$data['link_fb'] = $this->input->post('fbsekolah');
		$data['link_ig'] = $this->input->post('igsekolah');
		$data['link_maps'] = $this->input->post('mapsyayasan');
		$this->Sakinah->updateTable($tbl,$key,$arg,$data);
		redirect('be/profile/ProfileSekolahCTRL');
	}

}