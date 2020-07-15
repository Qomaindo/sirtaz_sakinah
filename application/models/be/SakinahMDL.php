<?php
	class SakinahMDL extends CI_Model{

		function check_user($data) {
			$this->db->select('t_user.user_id as user_id, m_guru.guru_id as guru_id, m_guru.nip, m_guru.nama_guru,t_role.role_code, t_role.role_name');
			$this->db->join('m_guru', 'm_guru.nip = t_user.nip');
			$this->db->join('t_role', 't_role.role_id = t_user.role_id');
			$this->db->where('t_user.user_status = 1');
			$query = $this->db->get_where('t_user', $data);
			return $query;
		}


		function DataGuru($guru_id){
		$this->db->select('m_guru.guru_id, m_guru.nip, m_guru.nama_guru, m_guru.jkel_guru, m_guru.nohp_guru, m_guru.alamat_rumah, m_guru.alamat_lembaga, m_guru.foto_guru, m_guru.status_guru, m_guru.email_guru, m_guru.tmplahir_guru, m_guru.pddknterakhir_guru, m_guru.tgllahir_guru,
							t_role.role_id, t_role.role_name, t_user.username, t_user.user_id
										 ');
		$this->db->from('m_guru');
		$this->db->where('m_guru.guru_id',$guru_id);
		// $this->db->where('m_guru.status_guru', '1');
		$this->db->join('t_user', 't_user.nip = m_guru.nip');
		$this->db->join('t_role', 't_role.role_id = t_user.role_id');
		$query = $this->db->get();
			if ($query->num_rows() >0){
				foreach ($query->result() as $data) {
					$employee[] = $data;
				}
			return $employee;
			}
		}

    public function insertTable($tbl,$data)
    {   
        $this->db->insert($tbl,$data);
    }

    public function updateTable($tbl,$key,$arg,$data)
    {   
        $this->db->where($key,$arg);
        $this->db->update($tbl, $data);     
    }

    public function getData($tbl,$field,$key,$args)
    {   
        $this->db->select($field);
        $this->db->from($tbl);
        $this->db->where($key,$args);
        $query = $this->db->get();  

        if($query->num_rows()>0){
            return $query->result();
        }else{
            return 0;
        }
    }

	function jmlUser()
		{   
		    $query = $this->db->get('t_user');
		    	if($query->num_rows()>0)
		    		{
		      	return $query->num_rows();
		    	}else{
		      return 0;
		    }
	}


	function jmlPengajar()
		{   
		    $query = $this->db->get('m_guru');
		    	if($query->num_rows()>0)
		    		{
		      	return $query->num_rows();
		    	}else{
		      return 0;
		    }
	}


	public function jmlSantri()
		{   
		    $query = $this->db->get('m_santri');
		    	if($query->num_rows()>0)
		    		{
		      	return $query->num_rows();
		    	}else{
		      return 0;
		    }
	}

	public function jmlSantriBaru()
		{   
		    $query = $this->db->get('t_datappdb');
		    	if($query->num_rows()>0)
		    		{
		      	return $query->num_rows();
		    	}else{
		      return 0;
		    }
	}

	public function jmlKelas()
		{   
		    $query = $this->db->get('t_kelas');
		    	if($query->num_rows()>0)
		    		{
		      	return $query->num_rows();
		    	}else{
		      return 0;
		    }
	}

    function jmlBerita()
        {   
            $query = $this->db->get('t_berita');
                if($query->num_rows()>0)
                    {
                return $query->num_rows();
                }else{
              return 0;
            }
    }

    function jmlInformasi()
        {   
            $query = $this->db->get('t_informasi');
                if($query->num_rows()>0)
                    {
                return $query->num_rows();
                }else{
              return 0;
            }
    }

    function data_yayasan()
    {
        $this->db->select('*');
        $this->db->from('t_yayasan');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $yayasan[] = $data;
            }
            return $yayasan;
        }
    }

    function profile_sekolah()
    {
        $this->db->select('*');
        $this->db->from('t_sekolah');
        $this->db->join('t_yayasan', 't_yayasan.yayasan_id = t_sekolah.yayasan_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $yayasan[] = $data;
            }
            return $yayasan;
        }
    }


    function data_tingkat()
    {
        $this->db->select('*');
        $this->db->from('t_tingkat');
        // $this->db->join('t_tingkat', 't_tingkat.tingkat_id = t_kelas.tingkat_id');
        // $this->db->group_by("t_kelas.tingkat_id");
        $this->db->order_by('kode_tingkat', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $yayasan[] = $data;
            }
            return $yayasan;
        }
    }

    function KelasTKQ()
    {
        $this->db->select('*');
        $this->db->from('t_kelas');
        $this->db->join('t_tingkat', 't_tingkat.tingkat_id = t_kelas.tingkat_id');
        // $this->db->group_by("t_kelas.tingkat_id");
        // $this->db->order_by('t_tingkat.kode_tingkat', 'ASC');
        $this->db->like('t_tingkat.kode_tingkat', 'TKQ');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $yayasan[] = $data;
            }
            return $yayasan;
        }
    }

    function KelasTAHFIDZ()
    {
        $this->db->select('*');
        $this->db->from('t_kelas');
        $this->db->join('t_tingkat', 't_tingkat.tingkat_id = t_kelas.tingkat_id');
        // $this->db->group_by("t_kelas.tingkat_id");
        // $this->db->order_by('t_tingkat.kode_tingkat', 'ASC');
        $this->db->like('t_tingkat.kode_tingkat', 'Tahfidz');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $yayasan[] = $data;
            }
            return $yayasan;
        }
    }

    function KelasTPQ()
    {
        $this->db->select('*');
        $this->db->from('t_kelas');
        $this->db->join('t_tingkat', 't_tingkat.tingkat_id = t_kelas.tingkat_id');
        // $this->db->group_by("t_kelas.tingkat_id");
        // $this->db->order_by('t_tingkat.kode_tingkat', 'ASC');
        $this->db->like('t_tingkat.kode_tingkat', 'TPQ');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $yayasan[] = $data;
            }
            return $yayasan;
        }
    }

    function Informasi()
    {
        $this->db->select('*');
        $this->db->from('t_informasi');
        // $this->db->group_by("t_kelas.tingkat_id");
        $this->db->order_by('tgl_unggah', 'DESC');
        $this->db->limit(4);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $yayasan[] = $data;
            }
            return $yayasan;
        }
    }

    function Berita()
    {
        $this->db->select('*');
        $this->db->from('t_berita');
        // $this->db->group_by("t_kelas.tingkat_id");
        $this->db->order_by('tgl_diunggah', 'DESC');
        $this->db->limit(4);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $yayasan[] = $data;
            }
            return $yayasan;
        }
    }

    function DataPengajar()
    {
        $this->db->select('*');
        $this->db->from('m_guru');
		$this->db->where('status_guru !=2');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $yayasan[] = $data;
            }
            return $yayasan;
        }
    }

}
