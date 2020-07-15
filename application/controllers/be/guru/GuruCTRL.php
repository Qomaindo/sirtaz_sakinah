<?php
class GuruCTRL extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model('be/GuruMDL', 'Guru');
        $this->load->model('be/SakinahMDL', 'Sakinah');
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect(base_url());
        }
        
	}

	function index(){

		$data['judul'] 		= "Data Guru";
		$data['nav_menu'] 	= "Guru";
        $data['pengajar']   = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
        $data['KDGuru']     = $this->Guru->GuruCode();
        $data['dataBagian']  = $this->Guru->get_bagian();
   		$data['mod']          = strtolower(get_class($this));
        $data['ProfileSK']  =  $this->Sakinah->profile_sekolah();
        $data['content'] 	= $this->load->view('be/guru/guru',$data,true);
		$this->load->view('templates/be/index', $data);
	}

    function guruDetail($id)
    {
        $data['judul']        = "Data Diri Guru";
        $data['nav_menu']     = "Guru";
        // $data['data_guru']    = $this->Guru->data_guru($id);
        $data['guru']     = $this->Guru->data_guru($id);
        $data['pengajar'] = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
        $data['mod']          = strtolower(get_class($this));
        $data['ProfileSK']  =  $this->Sakinah->profile_sekolah();
        $data['content']    = $this->load->view('be/guru/detail_guru',$data,true);
        $this->load->view('templates/be/index', $data);
    }


    public function ajax_list()
    {
        $list = $this->Guru->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $Guru) {
            $no++;
            $row = array();
            $row[] = '<center>' . $no . '</center>';
            $row[] = $Guru->nip;
            $row[] = $Guru->nama_guru;

            if ($Guru->jkel_guru == "L") {
                $row[] = "Laki-laki";
            } else if ($Guru->jkel_guru == "P") {
                $row[] = "Perempuan";
            } else {
                $row[] = "DATA KOSONG";
            }

            $row[] = $Guru->nohp_guru;
            if ($Guru->foto_guru != '') {
                $row[] = '<center><img src="' . base_url() . '/assets/be/image/employee/' . $Guru->foto_guru . '" class="img-responsive" width="45px" height="45px"></center>';
            } else {
                $row[] = '<center><img src="' . base_url() . '/assets/be/image/employee/default_employee.png" class="img-responsive" width="45px" height="45px"></center>';
            }
            $row[] = '<center>
                        <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Info" onclick="info(' . "'" . $Guru->guru_id . "'" . ')"><i class="fa fa-info-circle"></i></a>
                        <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Ubah" onclick="edit(' . "'" . $Guru->guru_id . "'" . ')"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleted(' . "'" . $Guru->guru_id . "'" . ')"><i class="fa fa-trash"></i></a>
                      </center>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Guru->count_all(),
			"recordsFiltered" => $this->Guru->count_filtered(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->Guru->get_user_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		//$this->_validate();
		$nohp = preg_replace("/[^0-9]/", "", $this->input->post('nohp_guru'));

		$data = array(
			'nip'           	=> htmlspecialchars($this->input->post('nip')),
			'nama_guru'     	=> htmlspecialchars($this->input->post('nama_guru')),
			'jkel_guru'     	=> htmlspecialchars($this->input->post('jenis_kelamin_guru')),
			'nohp_guru' 		=> $nohp,
			'email_guru'        => strtolower($this->input->post('email')),
			'nik'				=> htmlspecialchars($this->input->post('nik')),
			'no_rek'			=> htmlspecialchars($this->input->post('no_rek')),
			'lama_mengajar'		=> htmlspecialchars($this->input->post('lama_mengajar')),
			'tmplahir_guru'		=> htmlspecialchars($this->input->post('tmpt_lahir')),
			'tgllahir_guru'		=> htmlspecialchars($this->input->post('tgl_lahir')),
			'tmt'               => htmlspecialchars($this->input->post('tmt')),
			'pddknterakhir_guru' => htmlspecialchars($this->input->post('pend_terakhir')),
			'alamat_rumah'   	 => htmlspecialchars($this->input->post('alamat_rumah')),
			'alamat_lembaga'     => htmlspecialchars($this->input->post('alamat_lembaga')),
			'penerima_hibah'     => strtolower($this->input->post('pnrm_hibah')),
			'status_guru'   	 => '1'
		);

		if (!empty($_FILES['foto']['name'])) {
			$upload = $this->_do_upload();
			$data['foto_guru'] = $upload;
		}

		if (!empty($_FILES['foto_npwp']['name'])) {
			$upload = $this->_do_upload_npwp();
			$data['foto_npwp'] = $upload;
		}

		if (!empty($_FILES['foto_ktp']['name'])) {
			$upload = $this->_do_upload_ktp();
			$data['foto_ktp'] = $upload;
		}

		if (!empty($_FILES['foto_tabungan']['name'])) {
			$upload = $this->_do_upload_tabungan();
			$data['foto_bukutabungan'] = $upload;
		}

		if (!empty($_FILES['foto_ijazah']['name'])) {
			$upload = $this->_do_upload_ijazah();
			$data['foto_ijazah'] = $upload;
		}

		$this->Guru->save($data);

		$dtuser = array(
			'role_id' => $this->input->post('jabatan'),
			'nip'     => htmlspecialchars($this->input->post('nip')),
			'username' => $this->input->post('email'),
			'password' => md5($this->input->post('tgl_lahir')),
			'user_status' => '1'
		);

		$this->Guru->save_user($dtuser);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		//$this->_validate();
		$nohp = preg_replace("/[^0-9]/", "", $this->input->post('nohp_guru'));

		$data = array(
			'nip'           	 => htmlspecialchars($this->input->post('nip')),
			'nama_guru'     	 => htmlspecialchars($this->input->post('nama_guru')),
			'jkel_guru'     	 => htmlspecialchars($this->input->post('jenis_kelamin_guru')),
			'nohp_guru' 		 => $nohp,
			'email_guru'         => strtolower($this->input->post('email')),
			'nik'				=> htmlspecialchars($this->input->post('nik')),
			'no_rek'			=> htmlspecialchars($this->input->post('no_rek')),
			'lama_mengajar'		=> htmlspecialchars($this->input->post('lama_mengajar')),
			'tmplahir_guru'		 => htmlspecialchars($this->input->post('tmpt_lahir')),
			'tgllahir_guru'		 => htmlspecialchars($this->input->post('tgl_lahir')),
			'tmt'                => htmlspecialchars($this->input->post('tmt')),
			'pddknterakhir_guru' => htmlspecialchars($this->input->post('pend_terakhir')),
			'alamat_rumah'   	 => htmlspecialchars($this->input->post('alamat_rumah')),
			'alamat_lembaga'     => htmlspecialchars($this->input->post('alamat_lembaga')),
			'penerima_hibah'     => strtolower($this->input->post('pnrm_hibah'))
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
		//npwp
		if ($this->input->post('remove_photo_npwp')) // if remove photo checked
			{
				if (file_exists('assets/be/image/employee/' . $this->input->post('remove_photo_npwp')) && $this->input->post('remove_photo_npwp'))
					unlink('assets/be/image/employee/' . $this->input->post('remove_photo_npwp'));
				$data['foto_npwp'] = '';
			}

		if (!empty($_FILES['foto_npwp']['name'])) {
			$upload = $this->_do_upload_npwp();

			//delete file
			$logo = $this->Guru->get_by_id($this->input->post('id'));
			if (file_exists('assets/be/image/employee/' . $logo->foto_npwp) && $logo->foto_npwp)
				unlink('assets/be/image/employee/' . $logo->foto_npwp);

			$data['foto_npwp'] = $upload;
		}
		//ktp
		if ($this->input->post('remove_photo_ktp')) // if remove photo checked
			{
				if (file_exists('assets/be/image/employee/' . $this->input->post('remove_photo_ktp')) && $this->input->post('remove_photo_ktp'))
					unlink('assets/be/image/employee/' . $this->input->post('remove_photo_ktp'));
				$data['foto_ktp'] = '';
			}

		if (!empty($_FILES['foto_ktp']['name'])) {
			$upload = $this->_do_upload_ktp();

			//delete file
			$logo = $this->Guru->get_by_id($this->input->post('id'));
			if (file_exists('assets/be/image/employee/' . $logo->foto_ktp) && $logo->foto_ktp)
				unlink('assets/be/image/employee/' . $logo->foto_ktp);

			$data['foto_ktp'] = $upload;
		}
		//tabungan
		if ($this->input->post('remove_photo_tabungan')) // if remove photo checked
			{
				if (file_exists('assets/be/image/employee/' . $this->input->post('remove_photo_tabungan')) && $this->input->post('remove_photo_tabungan'))
					unlink('assets/be/image/employee/' . $this->input->post('remove_photo_tabungan'));
				$data['foto_bukutabungan'] = '';
			}

		if (!empty($_FILES['foto_tabungan']['name'])) {
			$upload = $this->_do_upload_tabungan();

			//delete file
			$logo = $this->Guru->get_by_id($this->input->post('id'));
			if (file_exists('assets/be/image/employee/' . $logo->foto_bukutabungan) && $logo->foto_bukutabungan)
				unlink('assets/be/image/employee/' . $logo->foto_bukutabungan);

			$data['foto_bukutabungan'] = $upload;
		}
		//ijazah
		if ($this->input->post('remove_photo_ijazah')) // if remove photo checked
			{
				if (file_exists('assets/be/image/employee/' . $this->input->post('remove_photo_ijazah')) && $this->input->post('remove_photo_ijazah'))
					unlink('assets/be/image/employee/' . $this->input->post('remove_photo_ijazah'));
				$data['foto_ijazah'] = '';
			}

		if (!empty($_FILES['foto_ijazah']['name'])) {
			$upload = $this->_do_upload_ijazah();

			//delete file
			$logo = $this->Guru->get_by_id($this->input->post('id'));
			if (file_exists('assets/be/image/employee/' . $logo->foto_ijazah) && $logo->foto_ijazah)
				unlink('assets/be/image/employee/' . $logo->foto_ijazah);

			$data['foto_ijazah'] = $upload;
		}

		$this->Guru->update(array('guru_id' => $this->input->post('id')), $data);

		$dtuser = array(
			'role_id' => $this->input->post('jabatan')
		);
		$this->Guru->update_user(array('nip' => $this->input->post('nip')), $dtuser);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->Guru->get_by_id($id);

		$this->Guru->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
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

	private function _do_upload_npwp()
	{
		$config['upload_path']          = 'assets/be/image/employee/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1000; //set max size allowed in Kilobyte
		$config['max_width']            = 2880; // set max width image allowed
		$config['max_height']           = 1800; // set max height allowed
		$config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto_npwp')) //upload and validate
			{
				$data['inputerror'][] = 'foto_npwp';
				$data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			}

		return $this->upload->data('file_name');
	}

	private function _do_upload_ktp()
	{
		$config['upload_path']          = 'assets/be/image/employee/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1000; //set max size allowed in Kilobyte
		$config['max_width']            = 2880; // set max width image allowed
		$config['max_height']           = 1800; // set max height allowed
		$config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto_ktp')) //upload and validate
			{
				$data['inputerror'][] = 'foto_ktp';
				$data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			}

		return $this->upload->data('file_name');
	}

	private function _do_upload_tabungan()
	{
		$config['upload_path']          = 'assets/be/image/employee/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1000; //set max size allowed in Kilobyte
		$config['max_width']            = 2880; // set max width image allowed
		$config['max_height']           = 1800; // set max height allowed
		$config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto_tabungan')) //upload and validate
			{
				$data['inputerror'][] = 'foto_tabungan';
				$data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			}

		return $this->upload->data('file_name');
	}

	private function _do_upload_ijazah()
	{
		$config['upload_path']          = 'assets/be/image/employee/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1000; //set max size allowed in Kilobyte
		$config['max_width']            = 2880; // set max width image allowed
		$config['max_height']           = 1800; // set max height allowed
		$config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto_ijazah')) //upload and validate
			{
				$data['inputerror'][] = 'foto_ijazah';
				$data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			}

		return $this->upload->data('file_name');
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('name') == '') {
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'nama masih kosong';
			$data['status'] = FALSE;
		}
	}
}
