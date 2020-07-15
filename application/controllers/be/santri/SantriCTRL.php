<?php
class SantriCTRL extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('be/SakinahMDL', 'Sakinah');
		$this->load->model('be/SantriMDL', 'Santri');
		if ($this->session->userdata('logged_in') == FALSE) {
			redirect(base_url());
		}
	}

	function index()
	{
		$data['judul'] 		= "Data Santri";
		$data['nav_menu'] 	= "Santri";
		$data['pengajar'] 	= $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
		$data['KDSantri'] 	= $this->Santri->SantriCode();
		$data['kelas'] 		= $this->Santri->get_kelas();
		$data['tingkat'] 	= $this->Santri->get_tingkat();
		$data['ProfileSK']  =  $this->Sakinah->profile_sekolah();
		$data['content'] 	= $this->load->view('be/santri/santri', $data, true);
		$this->load->view('templates/be/index', $data);
	}


	public function GetKelas()
	{
		$tbl    = 't_kelas';
		$field  = '*';
		$key    = 'tingkat_id';
		$args   = $this->input->post('recid');

		$arr = $this->Santri->getData($tbl, $field, $key, $args);
		$data = "<option value='0'>--- Pilih Kelas ---";
		foreach ($arr as $d) {
			$data .= "<option value='" . $d->kelas_id . "'>" . $d->nama_kelas;
		}
		echo json_encode($data);
	}

	function SantriDetail($id)
	{
		$data['judul']      = "Detail Data Santri";
		$data['nav_menu']   = "Santri";
		$data['Santri']     = $this->Santri->data_Santri($id);
		$data['pengajar'] 	= $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
		$data['mod']          = strtolower(get_class($this));
		$data['ProfileSK']  =  $this->Sakinah->profile_sekolah();
		$data['content'] 	= $this->load->view('be/santri/detail_santri', $data, true);
		$this->load->view('templates/be/index', $data);
	}


	public function ajax_list()
	{
		$list = $this->Santri->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $Santri) {
			$no++;
			$row = array();
			$row[] = '<center>' . $no . '</center>';
			$row[] = $Santri->nis;
			$row[] = $Santri->nama_santri;
			$row[] = $Santri->nama_tingkat;

			if ($Santri->foto_santri != '') {
				$row[] = '<center><img src="' . base_url() . '/assets/be/image/santri/' . $Santri->foto_santri . '" class="img-responsive" width="45px" height="45px"></center>';
			} else {
				$row[] = '<center><img src="' . base_url() . '/assets/be/image/santri/conan.jpg" class="img-responsive" width="45px" height="45px"></center>';
			}
			$row[] = '<center>
                        <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Info" onclick="info(' . "'" . $Santri->santri_id . "'" . ')"><i class="fa fa-info-circle"></i></a>
                        <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Ubah" onclick="edit(' . "'" . $Santri->santri_id . "'" . ')"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleted(' . "'" . $Santri->santri_id . "'" . ')"><i class="fa fa-trash"></i></a>
                      </center>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Santri->count_all(),
			"recordsFiltered" => $this->Santri->count_filtered(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->Santri->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		//$this->_validate();
		// $nohp = preg_replace("/[^0-9]/", "", $this->input->post('nohp_santri'));

		$data = array(
			'nis'       		=> htmlspecialchars($this->input->post('kdsantri')),
			'nisn'       		=> htmlspecialchars($this->input->post('nisn')),
			'nama_santri'     	=> htmlspecialchars($this->input->post('nama_santri')),
			'nama_wali'       	=> htmlspecialchars($this->input->post('nama_wali')),
			'jkel_santri'     	=> htmlspecialchars($this->input->post('jkelamin_santri')),
			'usia_santri' 		=> $this->input->post('usia'),
			'tmplahir_santri'	=> htmlspecialchars($this->input->post('tmpt_lahir')),
			'tgllahir_santri'	=> htmlspecialchars($this->input->post('tgl_lahir')),
			'tingkat_id'        => $this->input->post('tingkat'),
			'kelas_id'			=> $this->input->post('kelas'),
			'alamat_santri'   	=> htmlspecialchars($this->input->post('alamat_santri')),
			'password'			=> md5($this->input->post('tgl_lahir')),
			'keterangan_santri' => htmlspecialchars($this->input->post('keterangan'))
		);

		if (!empty($_FILES['foto']['name'])) {
			$upload = $this->_do_upload();
			$data['foto_santri'] = $upload;
		}

		if (!empty($_FILES['foto_kk']['name'])) {
			$upload = $this->_do_upload_kk();
			$data['foto_kk'] = $upload;
		}

		if (!empty($_FILES['foto_akta']['name'])) {
			$upload = $this->_do_upload_akta();
			$data['foto_aktakelahiran'] = $upload;
		}
		$idsantri = $this->Santri->save($data);

		$dtayah = array(
			'santri_id' => $idsantri
		);

		$this->Santri->save_ayah($dtayah);

		$dtibu = array(
			'santri_id' => $idsantri
		);

		$this->Santri->save_ibu($dtibu);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		//$this->_validate();
		$nohp = preg_replace("/[^0-9]/", "", $this->input->post('nohp_santri'));

		$data = array(
			'nis'       		=> htmlspecialchars($this->input->post('kdsantri')),
			'nisn'       		=> htmlspecialchars($this->input->post('nisn')),
			'nama_santri'       => htmlspecialchars($this->input->post('nama_santri')),
			'nama_wali'       	=> htmlspecialchars($this->input->post('nama_wali')),
			'jkel_santri'       => htmlspecialchars($this->input->post('jkelamin_santri')),
			'usia_santri'       => $this->input->post('usia'),
			'tmplahir_santri'   => htmlspecialchars($this->input->post('tmpt_lahir')),
			'tgllahir_santri'   => htmlspecialchars($this->input->post('tgl_lahir')),
			'tingkat_id'          => $this->input->post('tingkat'),
			'kelas_id'          => $this->input->post('kelas'),
			'alamat_santri'     => htmlspecialchars($this->input->post('alamat_santri')),
			'password'          => md5($this->input->post('tgl_lahir')),
			'keterangan_santri'     => htmlspecialchars($this->input->post('keterangan'))
		);

		if ($this->input->post('remove_photo')) // if remove photo checked
			{
				if (file_exists('assets/be/image/santri/' . $this->input->post('remove_photo')) && $this->input->post('remove_photo'))
					unlink('assets/be/image/santri/' . $this->input->post('remove_photo'));
				$data['foto'] = '';
			}

		if (!empty($_FILES['foto']['name'])) {
			$upload = $this->_do_upload();

			//delete file
			$logo = $this->Santri->get_by_id($this->input->post('id'));
			if (file_exists('assets/be/image/santri/' . $logo->foto_santri) && $logo->foto_santri)
				unlink('assets/be/image/santri/' . $logo->foto_santri);

			$data['foto_santri'] = $upload;
		}
		//kartu keluarga
		if ($this->input->post('remove_photo_kk')) // if remove photo checked
			{
				if (file_exists('assets/be/image/santri/' . $this->input->post('remove_photo')) && $this->input->post('remove_photo'))
					unlink('assets/be/image/santri/' . $this->input->post('remove_photo'));
				$data['foto_kk'] = '';
			}

		if (!empty($_FILES['foto_kk']['name'])) {
			$upload = $this->_do_upload_kk();

			//delete file
			$logo = $this->Santri->get_by_id($this->input->post('id'));
			if (file_exists('assets/be/image/santri/' . $logo->foto_kk) && $logo->foto_kk)
				unlink('assets/be/image/santri/' . $logo->foto_kk);

			$data['foto_kk'] = $upload;
		}
		//akta kelahiran
		if ($this->input->post('remove_photo_akta')) // if remove photo checked
			{
				if (file_exists('assets/be/image/santri/' . $this->input->post('remove_photo')) && $this->input->post('remove_photo'))
					unlink('assets/be/image/santri/' . $this->input->post('remove_photo'));
				$data['foto_aktakelahiran'] = '';
			}

		if (!empty($_FILES['foto_akta']['name'])) {
			$upload = $this->_do_upload_akta();

			//delete file
			$logo = $this->Santri->get_by_id($this->input->post('id'));
			if (file_exists('assets/be/image/santri/' . $logo->foto_aktakelahiran) && $logo->foto_aktakelahiran)
				unlink('assets/be/image/santri/' . $logo->foto_aktakelahiran);

			$data['foto_aktakelahiran'] = $upload;
		}

		$this->Santri->update(array('santri_id' => $this->input->post('id')), $data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->Santri->get_by_id($id);

		$this->Santri->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'assets/be/image/santri/';
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

	private function _do_upload_akta()
	{
		$config['upload_path']          = 'assets/be/image/santri/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1000; //set max size allowed in Kilobyte
		$config['max_width']            = 2880; // set max width image allowed
		$config['max_height']           = 1800; // set max height allowed
		$config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto_akta')) //upload and validate
			{
				$data['inputerror'][] = 'foto_akta';
				$data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			}

		return $this->upload->data('file_name');
	}

	private function _do_upload_kk()
	{
		$config['upload_path']          = 'assets/be/image/santri/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1000; //set max size allowed in Kilobyte
		$config['max_width']            = 2880; // set max width image allowed
		$config['max_height']           = 1800; // set max height allowed
		$config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto_kk')) //upload and validate
			{
				$data['inputerror'][] = 'foto_kk';
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
