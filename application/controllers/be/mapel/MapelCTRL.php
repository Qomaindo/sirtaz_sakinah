<?php
class MapelCTRL extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('be/MapelMDL', 'Mapel');
		$this->load->model('be/SakinahMDL', 'Sakinah');

		if ($this->session->userdata('logged_in') == FALSE) {
			redirect(base_url());
		}
	}

	function index()
	{
		$data['judul'] 		= "Data Mata Pelajaran";
		$data['nav_menu'] 	= "Mata Pelajaran";
		$data['pengajar'] = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
		$data['ProfileSK']  =  $this->Sakinah->profile_sekolah();
		$data['content'] 	= $this->load->view('be/mapel/mapel', $data, true);
		$this->load->view('templates/be/index', $data);
	}

	public function ajax_list()
	{
		$list = $this->Mapel->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $mapel) {
			$no++;
			$row = array();
			$row[] = '<center>' . $no . '</center>';
			$row[] = $mapel->nama_mapel;
			$row[] = '<center><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Ubah" onclick="edit(' . "'" . $mapel->mapel_id . "'" . ')"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleted(' . "'" . $mapel->mapel_id . "'" . ')"><i class="fa fa-trash"></i></a></center>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Mapel->count_all(),
			"recordsFiltered" => $this->Mapel->count_filtered(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->Mapel->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();

		$data = array(
			'mapel_id'	        => $this->input->post('id'),
			'nama_mapel'   		=> $this->input->post('mapel')
		);

		$this->Mapel->save($data);

		//$this->session->set_flashdata('success','Add item success!');
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();

		$data = array(
			'nama_mapel'   		=> $this->input->post('mapel')
		);

		$this->Mapel->update(array('mapel_id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->Mapel->get_by_id($id);

		$this->Mapel->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('mapel') == '') {
			$data['inputerror'][] = 'mapel';
			$data['error_string'][] = 'mata pelajaran masih kosong';
			$data['status'] = FALSE;
		}
	}
}
