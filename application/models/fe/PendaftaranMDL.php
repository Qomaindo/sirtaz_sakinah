<?php
	class PendaftaranMDL extends CI_Model{

    public function insertTable($tbl,$data)
    {   
        $this->db->insert($tbl,$data);
    }
    
    public function updateTable($tbl,$key,$arg,$data)
    {   
        $this->db->where($key,$arg);
        $this->db->update($tbl, $data);     
    }

    public function deleteTable($tbl,$key,$arg)
    {   
        $this->db->where($key,$arg)
                ->delete($tbl);
    }

    public function deleteData($tbl,$where){
        $res = $this->db->delete($tbl,$where);
        return $res;
    }

    public function updateData($tbl,$data,$where){
        $res = $this->db->update($tbl,$data,$where);
        return $res;
    }

       public function NoPendaftaran(){
        $thn = date("yy");
          $this->db->select('RIGHT(t_datappdb.datappdb_id,2) as kode', FALSE);
          $this->db->order_by('datappdb_id','DESC');
          $this->db->limit(1);
          $query = $this->db->get('t_datappdb');      //cek dulu apakah ada sudah ada kode di tabel.
          if($query->num_rows() <> 0){
           //jika kode ternyata sudah ada.
           $data = $query->row();
           $kode = intval($data->kode) + 1;
          }
          else {
           //jika kode belum ada
           $kode = 1;
          }
          $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
          $kodejadi = $thn."-".$kodemax;
          return $kodejadi; 
    }

}
