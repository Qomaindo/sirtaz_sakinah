<?php

class AbsenCTRL extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('be/JadwalMDL', 'Jadwal');
		$this->load->model('be/SakinahMDL', 'Sakinah');
		$this->load->model('be/AbsenMDL', 'Absen');
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect(base_url());
        }
	}

	function index()
	{
		$data['judul'] 		= "Jadwal Pengajar";
		$data['nav_menu'] 	= "Jadwal_Pengajar";
		$data['mapel']		= $this->Jadwal->get_mapel();
		$data['guru']		= $this->Jadwal->get_guru();
		$data['kelas']		= $this->Jadwal->get_kelas();
		$data['pengajar']   = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
		$data['ProfileSK']  =  $this->Sakinah->profile_sekolah();
		$data['content'] 	= $this->load->view('be/absen/absen', $data, true);
		$this->load->view('templates/be/index', $data);
	}

	public function ajax_list()
	{
		date_default_timezone_set("Asia/Jakarta");
		$hari = date ("D");
		$jam = date('G:i');
		// $jam = strtotime($jam_sekarang);
 
		switch($hari){
			case 'Sun':
				$hari_ini = "Minggu";
			break;
	 
			case 'Mon':			
				$hari_ini = "Senin";
			break;
	 
			case 'Tue':
				$hari_ini = "Selasa";
			break;
	 
			case 'Wed':
				$hari_ini = "Rabu";
			break;
	 
			case 'Thu':
				$hari_ini = "Kamis";
			break;
	 
			case 'Fri':
				$hari_ini = "Jumat";
			break;
	 
			case 'Sat':
				$hari_ini = "Sabtu";
			break;
			
			default:
				$hari_ini = "Tidak di ketahui";
			break;
		}

		$list = $this->Absen->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $jadwal) {
			$no++;

			date_default_timezone_set("Asia/Jakarta");
			$jam_masuk  = strtotime($jadwal->jam_masuk);
			$jam_keluar = strtotime($jadwal->jam_keluar);

			$jam_in = date("G:i", $jam_masuk) < $jam;
			$jam_out = date("G:i", $jam_keluar) > $jam;

			$row = array();
			$row[] = '<center>' . $no . '</center>';
			$row[] = $jadwal->hari;
			$row[] = $jadwal->nama_kelas;
			$row[] = $jadwal->nama_mapel;
			$row[] = date("G:i", $jam_masuk) . ' - ' . date("G:i", $jam_keluar);
			if(($hari_ini != $jadwal->hari) || ($jam_in == 0 ) || ($jam_out == 0 )){
				$row[] = '<center><a class="btn btn-sm btn-success" href="javascript:void(0)" title="Absen" onclick="edit(' . "'" . $jadwal->kelas_id . "'" . ')" disabled><i class="fa fa-pencil"></i> Absen </a></center>';

			}else{
				$row[] = '<center><a class="btn btn-sm btn-success" href="'. base_url('Absen').$jadwal->kelas_id.'" title="Absen" onclick="edit(' . "'" . $jadwal->kelas_id . "'" . ')"><i class="fa fa-pencil"></i> Absen </a></center>';
			}
			
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

	function AbsenSantri($id)
	{
		$data['judul'] 		= "Input Absen Santri";
		$data['nav_menu'] 	= "Absen";
		$data['Santri']     = $this->Absen->data_Santri($id);
		$data['pengajar']   = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
		$data['ProfileSK']  =  $this->Sakinah->profile_sekolah();
		$data['content'] 	= $this->load->view('be/absen/input_absen', $data, true);
		$this->load->view('templates/be/index', $data);
		// print_r($datasantri);
	}

	public function Simpan() {
		// $this->_validate();
	$tgl		= date("Y-m-d");
	$santriID	= $this->input->post('id');
	$keterangan		= $this->input->post('descript');
	$absen		= $this->input->post('absen');
	
	for ($i = 0; $i < count($this->input->post('no')); $i++) {

		if($absen[$i] == "hadir"){
			$hadir[$i]		= 1;
			$sakit[$i]		= 0;
			$izin[$i]		= 0;
			$alfa[$i]		= 0;
		}else if($absen[$i] == "sakit"){
			$hadir[$i]		= 0;
			$sakit[$i]		= 1;
			$izin[$i]		= 0;
			$alfa[$i]		= 0;
		}else if($absen[$i] == "izin"){
			$hadir[$i]		= 0;
			$sakit[$i]		= 0;
			$izin[$i]		= 1;
			$alfa[$i]		= 0;
		}else{
			$hadir[$i]		= 0;
			$sakit[$i]		= 0;
			$izin[$i]		= 0;
			$alfa[$i]		= 1;
		}
		
		$data = array(
			'santri_id'		=> $santriID[$i],
			'hadir'			=> $hadir[$i],
			'izin'			=> $izin[$i],
			'alfa'			=> $alfa[$i],
			'sakit'			=> $sakit[$i],
			'keterangan' 	=> $keterangan[$i],
			'tanggal'		=> $tgl
	);

		
		$insert = $this->Absen->save($data);
		// print_r($tgl);

	}
		redirect('be/absen/AbsenCTRL');
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
			'tanggal'   		=> $this->input->post('tgl'),
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
			'tanggal'   		=> $this->input->post('tgl'),
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
