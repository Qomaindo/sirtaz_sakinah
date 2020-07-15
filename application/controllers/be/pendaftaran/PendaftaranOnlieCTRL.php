<?php
class PendaftaranOnlieCTRL extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model('be/SakinahMDL', 'Sakinah');
        $this->load->model('be/PendaftaranOnlieMDL', 'Daftar');
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect(base_url());
        }
        
	}

	function index(){

		$data['judul'] 		= "Data Daftar Baru";
		$data['nav_menu'] 	= "DaftarBaru";
   		$data['pengajar'] = $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
   		$data['KDDaftar'] = $this->Daftar->NoPendaftaran();
        $data['ProfileSK']  =  $this->Sakinah->profile_sekolah();
       	$data['content'] 	= $this->load->view('be/pendaftaran/pendaftaran_online',$data,true);
		$this->load->view('templates/be/index', $data);
	}


    public function GetKelas(){
        $tbl    = 't_kelas';
        $field  = '*';
        $key    = 'tingkat_id';
        $args   = $this->input->post('recid');

    $arr = $this->Daftar->getData($tbl,$field,$key,$args);
    $data="<option value='0'>--- Pilih Kelas ---";
    foreach ($arr as $d) {
        $data.= "<option value='".$d->kelas_id."'>".$d->nama_kelas;
    }
        echo json_encode($data);
    }

    function DaftarDetail($id)
    {
        $data['judul']      = "Detail Data Daftar";
        $data['nav_menu']   = "Daftar";
        $data['Daftar']     = $this->Daftar->data_Daftar($id);
        $data['pengajar'] 	= $this->Sakinah->DataGuru($this->session->userdata('guru_id'));
        $data['mod']          = strtolower(get_class($this));
        $data['ProfileSK']  =  $this->Sakinah->profile_sekolah();
        $data['content'] 	= $this->load->view('be/Daftar/detail_Daftar',$data,true);
		$this->load->view('templates/be/index', $data);
    }


    public function ajax_list()
    {
        $list = $this->Daftar->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $Daftar) {
            $no++;
            $row = array();
            $row[] = '<center>' . $no . '</center>';
            $row[] = $Daftar->datappdb_id;
            $row[] = $Daftar->nama_lengkap;
            $row[] = $Daftar->tempat_lahir;
            $row[] = $Daftar->tgl_lahir;

            $row[] = '<center>
                        <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Ubah" onclick="edit(' . "'" . $Daftar->datappdb_id . "'" . ')"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleted(' . "'" . $Daftar->datappdb_id . "'" . ')"><i class="fa fa-trash"></i></a>
                      </center>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Daftar->count_all(),
            "recordsFiltered" => $this->Daftar->count_filtered(),
            "data" => $data
        );

        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->Daftar->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        //$this->_validate();
        $nohpayah = preg_replace("/[^0-9]/", "", $this->input->post('nohp_ayah'));
        $nohpibu = preg_replace("/[^0-9]/", "", $this->input->post('nohp_ibu'));

        $data = array(
            'datappdb_id'       => htmlspecialchars($this->input->post('kddaftar')), 
            'nama_lengkap'      => htmlspecialchars($this->input->post('nama_lengkap')), 
            'password'          => md5($this->input->post('tgl_lahir')),
            'tempat_lahir'      => htmlspecialchars($this->input->post('tmpt_lahir')),
            'tgl_lahir'         => htmlspecialchars($this->input->post('tgl_lahir')), 
            'nik_ayah'          => htmlspecialchars($this->input->post('nik_ayah')),
            'nama_ayah'         => htmlspecialchars($this->input->post('nama_ayah')),
            'pekerjaan_ayah'    => htmlspecialchars($this->input->post('pekerjaan_ayah')),
            'nohp_ayah'         => $nohpayah,
            'nik_ibu'           => htmlspecialchars($this->input->post('nik_ibu')),
            'nama_ibu'          => htmlspecialchars($this->input->post('nama_ibu')),
            'pekerjaan_ibu'     => htmlspecialchars($this->input->post('pekerjaan_ibu')),
            'nohp_ibu'          => $nohpibu,
            'status_datappdb'   => 1
        );

        $this->Daftar->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        //$this->_validate();
        $nohpayah = preg_replace("/[^0-9]/", "", $this->input->post('nohp_ayah'));
        $nohpibu = preg_replace("/[^0-9]/", "", $this->input->post('nohp_ibu'));

        $data = array(
            'datappdb_id'       => htmlspecialchars($this->input->post('kddaftar')), 
            'nama_lengkap'      => htmlspecialchars($this->input->post('nama_lengkap')), 
            'password'          => md5($this->input->post('tgl_lahir')),
            'tempat_lahir'      => htmlspecialchars($this->input->post('tmpt_lahir')),
            'tgl_lahir'         => htmlspecialchars($this->input->post('tgl_lahir')), 
            'nik_ayah'          => htmlspecialchars($this->input->post('nik_ayah')),
            'nama_ayah'         => htmlspecialchars($this->input->post('nama_ayah')),
            'pekerjaan_ayah'    => htmlspecialchars($this->input->post('pekerjaan_ayah')),
            'nohp_ayah'         => $nohpayah,
            'nik_ibu'           => htmlspecialchars($this->input->post('nik_ibu')),
            'nama_ibu'          => htmlspecialchars($this->input->post('nama_ibu')),
            'pekerjaan_ibu'     => htmlspecialchars($this->input->post('pekerjaan_ibu')),
            'nohp_ibu'          => $nohpibu,
            'status_datappdb'   => 1
        );

        $this->Daftar->update(array('datappdb_id' => $this->input->post('id')), $data);

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->Daftar->get_by_id($id);

        $this->Daftar->delete_by_id($id);
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
            $data['error_string'][] = 'nama masih kosong';
            $data['status'] = FALSE;
        }
    }

}