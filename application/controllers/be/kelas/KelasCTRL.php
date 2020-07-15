<?php
class KelasCTRL extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('be/KelasMDL', 'Kelas');
        $this->load->model('be/SakinahMDL', 'Sakinah');
	}

	function index(){
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect(base_url());
        }

		$data['judul'] 		= "Data Kelas";
		$data['nav_menu'] 	= "Kelas";
   		$data['pengajar'] = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
        $data['data_tingkat']  = $this->Kelas->get_tingkat();
        $data['data_guru']  = $this->Kelas->get_guru();
        $data['ProfileSK']  =  $this->Sakinah->profile_sekolah();
        $data['content'] 	= $this->load->view('be/kelas/kelas',$data,true);
		$this->load->view('templates/be/index', $data);
	}

    public function ajax_list()
    {
        $list = $this->Kelas->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $kelas) {
            $no++;
            $row = array();
            $row[] = '<center>' . $no . '</center>';
            $row[] = '<center>' . $kelas->kode_tingkat . '</center>';
            $row[] = '<center>' . $kelas->nama_kelas . '</center>';
            $row[] = '<center>' . $kelas->nama_guru . '</center>';
            $row[] = '<center>' . $kelas->waktu . '</center>';
            $row[] = '<center><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Ubah" onclick="edit(' . "'" . $kelas->kelas_id . "'" . ')"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleted(' . "'" . $kelas->kelas_id . "'" . ')"><i class="fa fa-trash"></i></a></center>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Kelas->count_all(),
            "recordsFiltered" => $this->Kelas->count_filtered(),
            "data" => $data
        );

        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->Kelas->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();

        $data = array(
            'nip'	            => $this->input->post('nip'),
            'tingkat_id'   	=> $this->input->post('tingkat'),
            'nama_kelas' 	        => $this->input->post('nama_kelas'),
            'waktu' 	            => $this->input->post('waktu')
        );

        $this->Kelas->save($data);

        //$this->session->set_flashdata('success','Add item success!');
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $this->_validate();

        $data = array(
            'nip'     => $this->input->post('nip'),
            'tingkat_id'    => $this->input->post('tingkat'),
            'nama_kelas'    => $this->input->post('nama_kelas'),
            'waktu'         => $this->input->post('waktu')
        );

        $this->Kelas->update(array('kelas_id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->Kelas->get_by_id($id);

        $this->Kelas->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('name') == '') {
            $data['inputerror'][] = 'name';
            $data['error_string'][] = 'nama jabatan masih kosong';
            $data['status'] = FALSE;
        }
    }

}