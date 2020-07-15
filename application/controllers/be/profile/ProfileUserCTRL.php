<?php
class ProfileUserCTRL extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model('be/SakinahMDL', 'Sakinah');
        $this->load->model('be/GuruMDL', 'Guru');
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect(base_url());
        }
        
	}

	function index(){

		$data['judul'] 		= "Informasi Diri";
		$data['nav_menu'] 	= "Profile";
        $data['pengajar'] = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
   		$data['dataBagian']  = $this->Guru->get_bagian();
    $data['ProfileSK']  =  $this->Sakinah->profile_sekolah();
   		$data['content'] 	= $this->load->view('be/profile/profile_user',$data,true);
		$this->load->view('templates/be/index', $data);
	}


	public function ajax_edit_employee($id) {
			$data = $this->Sakinah->DataGuru($id);
			echo json_encode($data);
	}

  public function ajax_update_password() {
			$this->_validate_password();

      $data = array(
					'password' => md5($this->input->post('confirm_new_password'))
			);

			$this->Guru->update_password(array('user_id' => $this->session->userdata('user_id')), $data);
			echo json_encode(array("status" => TRUE));
	}

	public function ajax_update_employee() {
			// $this->_validate_employee();
   //$this->_validate();
        $nohp = preg_replace("/[^0-9]/", "", $this->input->post('nohp_guru'));

        $data = array(
            'nip'           	=> htmlspecialchars($this->input->post('nip')),
            'nama_guru'     	=> htmlspecialchars($this->input->post('nama_guru')),
            'jkel_guru'     	=> htmlspecialchars($this->input->post('jenis_kelamin_guru')),
            'nohp_guru' 		=> $nohp,
            'email_guru'        => strtolower($this->input->post('email')),
            'tmplahir_guru'		=> htmlspecialchars($this->input->post('tmpt_lahir')),
            'tgllahir_guru'		=> htmlspecialchars($this->input->post('tgl_lahir')),
            'pddknterakhir_guru'=> htmlspecialchars($this->input->post('pend_terakhir')),
            'alamat_rumah'   	=> htmlspecialchars($this->input->post('alamat_rumah')),
            'alamat_lembaga'    => htmlspecialchars($this->input->post('alamat_lembaga'))
        );

        if ($this->input->post('remove_photo')) // if remove photo checked
        {
            if (file_exists('assets/be/image/employee/' . $this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink('assets/be/image/employee/' . $this->input->post('remove_photo'));
            $data['foto'] = '';
        }

        if (!empty($_FILES['foto']['name'])) {
            $upload = $this->_do_upload();

            //delete file
            $logo = $this->Guru->get_by_id($this->input->post('id'));
            if (file_exists('assets/be/image/employee/' . $logo->foto_guru) && $logo->foto_guru)
                unlink('assets/be/image/employee/' . $logo->foto_guru);

            $data['foto_guru'] = $upload;
        }

        $this->Guru->update(array('guru_id' => $this->input->post('id')), $data);

        $dtuser = array(
                        'role_id' => $this->input->post('jabatan')
                    );
        $this->Guru->update_user(array('nip' => $this->input->post('nip')), $dtuser);        
        echo json_encode(array("status" => TRUE));
	}

  public function ajax_check_password_employee(){
			$data = array('password' => md5($this->input->post('old_password', TRUE)));
			$result = $this->Guru->check_password_employee($data);
			$data['json'] = $result->num_rows();
			$this->load->view('ajax',$data);
	}

    private function _do_upload()
    {
        $config['upload_path']          = 'assets/be/image/employee/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000; //set max size allowed in Kilobyte
        $config['max_width']            = 2880; // set max width image allowed
        $config['max_height']           = 1800; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) //upload and validate
        {
            $data['inputerror'][] = 'foto';
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }

        return $this->upload->data('file_name');
    }

  private function _validate_password() {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

			if($this->input->post('old_password') == '') {
					$data['inputerror'][] = 'old_password';
					$data['error_string'][] = 'Password Lama belum diisi';
					$data['status'] = FALSE;
			}

			if($this->input->post('new_password') == '') {
					$data['inputerror'][] = 'new_password';
					$data['error_string'][] = 'Password Baru belum diisi';
					$data['status'] = FALSE;
			}

			if($this->input->post('confirm_new_password') == '') {
					$data['inputerror'][] = 'confirm_new_password';
					$data['error_string'][] = 'Konfirmasi Password Baru belum diisi';
					$data['status'] = FALSE;
			}

      if($data['status'] === FALSE) {
          echo json_encode($data);
          exit();
      }
  }

}