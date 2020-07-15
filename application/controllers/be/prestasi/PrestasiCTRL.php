<?php
class PrestasiCTRL extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('be/PrestasiMDL', 'Prestasi');
		$this->load->model('be/SakinahMDL', 'Sakinah');

		if ($this->session->userdata('logged_in') == FALSE) {
			redirect(base_url());
		}
	}

	function index()
	{
		$data['judul'] 		= "Prestasi";
		$data['nav_menu'] 	= "Maintenance Data Prestasi";
		$data['kelas']   	= $this->Prestasi->get_kelas($this->session->userdata('guru_id'));
		$data['pengajar']   = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
		$data['ProfileSK']  =  $this->Sakinah->profile_sekolah();
		$data['content'] 	= $this->load->view('be/prestasi/validasiPrestasi', $data, true);
		$this->load->view('templates/be/index', $data);
	}

	public function GetMapel()
	{
		$args   = $this->input->post('recid');

		$arr = $this->Prestasi->get_mapel($this->session->userdata('guru_id'), $args);
		$data = "<option value='#'>-- Pilih Satu --";
		foreach ($arr as $d) {
			$data .= "<option value='" . $d->mapel_id . "'>" . $d->nama_mapel;
		}
		echo json_encode($data);
	}

	public function ajax_search()
	{
		$kelas = $this->input->post('kelas');
		$data  = $this->Prestasi->get_santri($kelas);

		echo json_encode($data);
	}

	public function ajax_link()
	{
		$kelas_id = $this->uri->segment(5);
		$mapel_id = $this->uri->segment(6);

		$data['judul'] 		= "Prestasi";
		$data['nav_menu'] 	= "Maintenance Data Prestasi";
		$data['pengajar']   = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
		$data['ProfileSK']  = $this->Sakinah->profile_sekolah();

		$data['kelas']   	= $this->Prestasi->get_kelas($kelas_id);
		$data['santri'] 	= $this->Prestasi->get_santri($kelas_id);
		$data['jadwal']   	= $this->Prestasi->get_jadwal($kelas_id, $mapel_id);

		$data['content'] 	= $this->load->view('be/prestasi/prestasi', $data, true);
		$this->load->view('templates/be/index', $data);
	}

	public function ajax_prestasi()
	{
		$santri_id = $this->input->post('santri[]');
		$prestasi  =  $this->input->post('prestasi[]');

		$dt = array();
		for ($i = 0; $i < count($santri_id); $i++) {

			$dt = array(
				'jadwal_id' => $this->input->post('jadwal'),
				'santri_id' => $santri_id[$i],
				'prestasi'  => $prestasi[$i],
				'tanggal'   => date('Ymd')
			);

			$this->db->insert('t_prestasi', $dt);
		}
		echo json_encode(array('status' => TRUE));
	}
}
