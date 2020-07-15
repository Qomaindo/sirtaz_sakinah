<?php
	class FrontEndMDL extends CI_Model{

		function check_user($data) {
			$this->db->select('datappdb_id, nisn, nama_lengkap, password');
			$this->db->where('t_datappdb.status_datappdb = 1');
			$query = $this->db->get_where('t_datappdb', $data);
			return $query;
		}


		function DataSantriBaru($datappdb_id){
        $this->db->select('datappdb_id, nisn, nama_lengkap, tempat_lahir, tgl_lahir, usia, jenis_kelamin,
                            nik_ayah, nama_ayah, pekerjaan_ayah, nik_ibu, nama_ibu, pekerjaan_ibu, nama_wali,
                            no_hp, foto_formal, foto_aktakelahiran, foto_kk, status_datappdb ');
		$this->db->from('t_datappdb');
		$this->db->where('t_datappdb.datappdb_id',$datappdb_id);
		$query = $this->db->get();
			if ($query->num_rows() >0){
				foreach ($query->result() as $data) {
					$employee[] = $data;
				}
			return $employee;
			}
        }
        
    }