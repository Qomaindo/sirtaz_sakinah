<?php

class InfoBeritaCTRL extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('be/SakinahMDL', 'Sakinah');
		$this->load->model('be/InfoMDL', 'Info');
		$this->load->model('be/BeritaMDL', 'Berita');
	}

	function index()
	{
		if ($this->session->userdata('logged_in') == FALSE) {
			redirect(base_url());
		}

		$data['judul'] 		= "Informasi & Berita";
		$data['nav_menu'] 	= "info_berita";
		$data['ProfileSK'] 	= $this->Sakinah->profile_sekolah();
		$data['pengajar']   = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
		$data['content'] 	= $this->load->view('be/infoberita/infoberita', $data, true);
		$this->load->view('templates/be/index', $data);
	}

// ==================================================================
				// CRUD INFORMASI
// ==================================================================
	public function ajax_list_informasi()
	{
		$list = $this->Info->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $info) {
			$kalimat= $info->isi_info;
                  $jumlahkarakter=0;
                  $cetak = substr($kalimat,$jumlahkarakter,70)."...";

			$no++;
			$row = array();
			$row[] = '<center>' . $no . '</center>';
			$row[] = '<center>' . $info->judul_info . '</center>';
			$row[] = '<center>' . $info->sub_judul . '</center>';
			$row[] = '<center>' . $cetak . '</center>';
			$row[] = '<center>' . $info->tgl_info . '</center>';
			$row[] = '<center><img src="' . base_url() . '/assets/be/image/info_berita/' . $info->foto_info . '" class="img-responsive" width="45px" height="45px"></center>';
			$row[] = '<center><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Ubah" onclick="edit_informasi(' . "'" . $info->informasi_id . "'" . ')"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleted_informasi(' . "'" . $info->informasi_id . "'" . ')"><i class="fa fa-trash"></i></a></center>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Info->count_all(),
			"recordsFiltered" => $this->Info->count_filtered(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function ajax_edit_informasi($id)
	{
		$data =  $this->Info->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add_informasi()
	{
		// $this->_validate();

		$data = array(
			'user_id'			=> $this->session->userdata('user_id'),
			'tgl_unggah'     	=> date("Ymd"),
			'judul_info'     	=> htmlspecialchars($this->input->post('judul_info')),
			'sub_judul'        	=> strtolower($this->input->post('sub_judul_info')),
			'isi_info'			=> $this->input->post('isi_info'),
			'tgl_info'			=> htmlspecialchars($this->input->post('tgl_info'))
		);

		if (!empty($_FILES['foto_info']['name'])) {
			$upload =  $this->_do_upload_info();
			$data['foto_info'] =  $upload;
		}
		$this->Info->save($data);

		// redirect('be/infoberita/InfoBeritaCTRL');

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update_informasi()
	{
		// $this->_validate();

		$data = array(
			'user_id'			=> $this->session->userdata('user_id'),
			'tgl_unggah'     	=> date("Ymd"),
			'judul_info'     	=> htmlspecialchars($this->input->post('judul_info')),
			'sub_judul'        	=> strtolower($this->input->post('sub_judul_info')),
			'isi_info'			=> $this->input->post('isi_info'),
			'tgl_info'			=> htmlspecialchars($this->input->post('tgl_info'))
		);

		if ($this->input->post('remove_photo')) // if remove photo checked
			{
				if (file_exists('assets/be/image/info_berita/' .  $this->input->post('remove_photo')) &&  $this->input->post('remove_photo'))
					unlink('assets/be/image/info_berita/' .  $this->input->post('remove_photo'));
				$data['foto'] = '';
			}

		if (!empty($_FILES['foto_info']['name'])) {
			$upload =  $this->_do_upload_info();

			//delete file
			$info =  $this->Info->get_by_id($this->input->post('id_info'));
			if (file_exists('assets/be/image/info_berita/' .  $info->foto_info) &&  $info->foto_info)
				unlink('assets/be/image/info_berita/' .  $info->foto_info);

			$data['foto_info'] =  $upload;
		}

		$this->Info->update(array('informasi_id' =>  $this->input->post('id_info')),  $data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete_informasi($id)
	{
		$info = $this->Info->get_by_id($id);
		if (file_exists('assets/be/image/info_berita/' . $info->foto_info) && $info->foto_info)
			unlink('assets/be/image/info_berita/' . $info->foto_info);

		$this->Info->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

// ==================================================================
				// CRUD BERITA
// ==================================================================

	public function ajax_list_berita()
	{
		$list = $this->Berita->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $berita) {

			$kalimat= $berita->isi_berita;
                  $jumlahkarakter=0;
                  $cetak = substr($kalimat,$jumlahkarakter,70)."...";

			$no++;
			$row = array();
			$row[] = '<center>' . $no . '</center>';
			$row[] = '<center>' . $berita->judul_berita . '</center>';
			$row[] = '<center>' . $berita->sub_judul_berita . '</center>';
			$row[] = '<center>' . $cetak . '</center>';
			$row[] = '<center>' . $berita->tgl_berita . '</center>';
			$row[] = '<center><img src="' . base_url() . '/assets/be/image/info_berita/' . $berita->foto_berita . '" class="img-responsive" width="45px" height="45px"></center>';
			$row[] = '<center><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Ubah" onclick="edit_berita(' . "'" . $berita->berita_id . "'" . ')"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleted_berita(' . "'" . $berita->berita_id . "'" . ')"><i class="fa fa-trash"></i></a></center>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Berita->count_all(),
			"recordsFiltered" => $this->Berita->count_filtered(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function ajax_edit_berita($id)
	{
		$data =  $this->Berita->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add_berita()
	{
		// $this->_validate();

		$data = array(
			'user_id'			=> $this->session->userdata('user_id'),
			'tgl_diunggah'     	=> date("Ymd"),
			'judul_berita'     	=> htmlspecialchars($this->input->post('judul_berita')),
			'sub_judul_berita'        	=> strtolower($this->input->post('sub_judul_berita')),
			'isi_berita'			=> $this->input->post('isi_berita'),
			'tgl_berita'			=> htmlspecialchars($this->input->post('tgl_berita'))
		);

		if (!empty($_FILES['foto_berita']['name'])) {
			$upload =  $this->_do_upload_berita();
			$data['foto_berita'] =  $upload;
		}
		$this->Berita->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update_berita()
	{
		// $this->_validate();

		$data = array(
			'user_id'			=> $this->session->userdata('user_id'),
			'tgl_diunggah'     	=> date("Ymd"),
			'judul_berita'     	=> htmlspecialchars($this->input->post('judul_berita')),
			'sub_judul_berita'        	=> strtolower($this->input->post('sub_judul_berita')),
			'isi_berita'			=> $this->input->post('isi_berita'),
			'tgl_berita'			=> htmlspecialchars($this->input->post('tgl_berita'))
		);

		if ($this->input->post('remove_photo')) // if remove photo checked
			{
				if (file_exists('assets/be/image/info_berita/' .  $this->input->post('remove_photo')) &&  $this->input->post('remove_photo'))
					unlink('assets/be/image/info_berita/' .  $this->input->post('remove_photo'));
				$data['foto'] = '';
			}

		if (!empty($_FILES['foto_berita']['name'])) {
			$upload =  $this->_do_upload_berita();

			//delete file
			$berita =  $this->Berita->get_by_id($this->input->post('id_berita'));
			if (file_exists('assets/be/image/info_berita/' .  $berita->foto_berita) &&  $berita->foto_berita)
				unlink('assets/be/image/info_berita/' .  $berita->foto_berita);

			$data['foto_berita'] =  $upload;
		}

		$this->Berita->update(array('berita_id' =>  $this->input->post('id_berita')),  $data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete_berita($id)
	{
		$berita = $this->Berita->get_by_id($id);
		if (file_exists('assets/be/image/info_berita/' . $berita->foto_berita) && $berita->foto_berita)
			unlink('assets/be/image/info_berita/' . $berita->foto_berita);

		$this->Berita->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload_info()
	{
		$config['upload_path']          = 'assets/be/image/info_berita/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 2048; //set max size allowed in Kilobyte
		$config['max_width']            = 2880; // set max width image allowed
		$config['max_height']           = 1800; // set max height allowed
		$config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

		$this->load->library('upload',  $config);

		if (!$this->upload->do_upload('foto_info')) //upload and validate
			{
				$data['inputerror'][] = 'foto';
				$data['error_string'][] = 'Upload error: ' .  $this->upload->display_errors('', ''); //show ajax error
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			}

		return  $this->upload->data('file_name');
	}

	private function _do_upload_berita()
	{
		$config['upload_path']          = 'assets/be/image/info_berita/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 2048; //set max size allowed in Kilobyte
		$config['max_width']            = 2880; // set max width image allowed
		$config['max_height']           = 1800; // set max height allowed
		$config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

		$this->load->library('upload',  $config);

		if (!$this->upload->do_upload('foto_berita')) //upload and validate
			{
				$data['inputerror'][] = 'foto_berita';
				$data['error_string'][] = 'Upload error: ' .  $this->upload->display_errors('', ''); //show ajax error
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			}

		return  $this->upload->data('file_name');
	}
}
