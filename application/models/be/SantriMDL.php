<?php defined('BASEPATH') or exit('No direct script access allowed');

class SantriMDL extends CI_Model
{

    var $table      = 'm_santri';
    var $table_ayah = 't_ayah';
    var $table_ibu  = 't_ibu';
    var $column_order = array('tmplahir_santri', 'nama_santri', 'tgllahir_santri');
    var $column_search = array('tmplahir_santri', 'nama_santri', 'tgllahir_santri');
    var $order = array('nama_santri' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_kelas()
    {
        $this->db->order_by('nama_kelas', 'ASC');
        // $this->db->where('role_status', '1');
        $query = $this->db->get('t_kelas');
        return $query->result_array();
    }

    public function get_tingkat()
    {
        $this->db->order_by('nama_tingkat', 'ASC');
        // $this->db->where('role_status', '1');
        $query = $this->db->get('t_tingkat');
        return $query->result_array();
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

    private function _get_datatables_query()
    {

        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('t_tingkat', 't_tingkat.tingkat_id = m_santri.tingkat_id', 'left');
        // $this->db->join('t_kelas', 't_kelas.tingkat_id = t_tingkat.tingkat_id', 'left');

        $i = 0;

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('santri_id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function save_ayah($data)
    {
        $this->db->insert($this->table_ayah, $data);
        return $this->db->insert_id();
    }

    public function save_ibu($data)
    {
        $this->db->insert($this->table_ibu, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('santri_id', $id);
        $this->db->delete($this->table);
    }

    function data_santri($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('m_santri.santri_id', $id);
        $this->db->join('t_kelas', 't_kelas.kelas_id = m_santri.kelas_id', 'left');
        $this->db->join('t_tingkat', 't_tingkat.tingkat_id = t_kelas.tingkat_id', 'left');
        $this->db->join('t_ayah', 't_ayah.santri_id = m_santri.santri_id', 'left');
        $this->db->join('t_ibu', 't_ibu.santri_id = m_santri.santri_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $employee[] = $data;
            }
            return $employee;
        }
    }

    public function SantriCode(){
        $tgl = date("d");
        $bln = date("m");
        $thn = date("y");
          $this->db->select('RIGHT(m_santri.nis,2) as kode', FALSE);
          $this->db->order_by('santri_id','DESC');
          $this->db->limit(1);
          $query = $this->db->get('m_santri');      //cek dulu apakah ada sudah ada kode di tabel.
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
          $kodejadi = $thn.$bln.$tgl.$kodemax;
          return $kodejadi;
    }
}
