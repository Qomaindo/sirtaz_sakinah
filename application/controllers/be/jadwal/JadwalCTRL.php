<?php
class JadwalCTRL extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('be/JadwalMDL', 'Jadwal');
		$this->load->model('be/SakinahMDL', 'Sakinah');

		if ($this->session->userdata('logged_in') == FALSE) {
			redirect(base_url());
		}
		date_default_timezone_set('UTC');
	}

	function index()
	{
		$data['judul'] 		= "Jadwal Pengajar";
		$data['nav_menu'] 	= "Jadwal Pengajar";
		$data['mapel']		= $this->Jadwal->get_mapel();
		$data['guru']		= $this->Jadwal->get_guru();
		$data['kelas']		= $this->Jadwal->get_kelas();
		$data['pengajar']   = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
		$data['ProfileSK']  =  $this->Sakinah->profile_sekolah();
		$data['content'] 	= $this->load->view('be/jadwal/jadwal', $data, true);
		$this->load->view('templates/be/index', $data);
	}

	public function ajax_list()
	{
		$list = $this->Jadwal->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $jadwal) {
			$no++;

			$jam_masuk  = strtotime($jadwal->jam_masuk);
			$jam_keluar = strtotime($jadwal->jam_keluar);
			//$tanggal 	= strtotime($jadwal->tanggal);

			$row = array();
			$row[] = '<center>' . $no . '</center>';
			$row[] = $jadwal->hari;
			$row[] = $jadwal->nama_kelas;
			$row[] = $jadwal->nama_guru;
			$row[] = $jadwal->nama_mapel;
			$row[] = date("h:i", $jam_masuk) . ' - ' . date("h:i", $jam_keluar);
			$row[] = '<center><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Ubah" onclick="edit(' . "'" . $jadwal->jadwal_id . "'" . ')"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleted(' . "'" . $jadwal->jadwal_id . "'" . ')"><i class="fa fa-trash"></i></a></center>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Jadwal->count_all(),
			"recordsFiltered" => $this->Jadwal->count_filtered(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->Jadwal->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();

		$data = array(
			'jadwal_id'	        => $this->input->post('id'),
			'kelas_id'   		=> $this->input->post('kelas'),
			'mapel_id'   		=> $this->input->post('mapel'),
			'guru_id'   		=> $this->input->post('guru'),
			'hari'				=> $this->input->post('hari'),
			'jam_masuk'   		=> $this->input->post('jam_masuk'),
			'jam_keluar'   		=> $this->input->post('jam_keluar')
		);

		$this->Jadwal->save($data);

		//$this->session->set_flashdata('success','Add item success!');
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();

		$data = array(
			'kelas_id'   		=> $this->input->post('kelas'),
			'mapel_id'   		=> $this->input->post('mapel'),
			'guru_id'   		=> $this->input->post('guru'),
			'hari'				=> $this->input->post('hari'),
			'jam_masuk'   		=> $this->input->post('jam_masuk'),
			'jam_keluar'   		=> $this->input->post('jam_keluar')
		);

		$this->Jadwal->update(array('jadwal_id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->Jadwal->get_by_id($id);

		$this->Jadwal->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('kelas') == '') {
			$data['inputerror'][] = 'kelas';
			$data['error_string'][] = 'kelas belum dipilih';
			$data['status'] = FALSE;
		}

		if ($this->input->post('mapel') == '') {
			$data['inputerror'][] = 'mapel';
			$data['error_string'][] = 'mata pelajaran belum dipilih';
			$data['status'] = FALSE;
		}

		if ($this->input->post('guru') == '') {
			$data['inputerror'][] = 'guru';
			$data['error_string'][] = 'pengajar belum dipilih';
			$data['status'] = FALSE;
		}
	}
}
