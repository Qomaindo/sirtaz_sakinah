<?php defined('BASEPATH') or exit('No direct script access allowed');

class GuruMDL extends CI_Model
{

    var $table       = 'm_guru';
    var $table_user  = 't_user';
    var $column_order = array('nip', 'nama_guru', 'nohp_guru', 'pddknterakhir_guru');
    var $column_search = array('nip', 'nama_guru', 'nohp_guru', 'pddknterakhir_guru');
    var $order = array('guru_id' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_bagian()
    {
        $this->db->order_by('role_name', 'ASC');
        $this->db->where('role_status', '1');
        $query = $this->db->get('t_role');
        return $query->result_array();
    }

    private function _get_datatables_query()
    {

        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('status_guru', '1');

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
        $this->db->where('guru_id', $id);
        $this->db->join('t_user', 't_user.nip = t_user.nip');
        $query = $this->db->get();

        return $query->row();
    }

    public function get_user_by_id($id)
    {
        $this->db->select('*');
        $this->db->from($this->table_user);
        $this->db->where('guru_id', $id);
        $this->db->join($this->table, 'm_guru.nip = t_user.nip');
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function save_user($data)
    {
        $this->db->insert($this->table_user, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function update_user($where, $data)
    {
        $this->db->update($this->table_user, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('guru_id', $id);
        $this->db->delete($this->table);
    }

    public function check_password_employee($data) {
            $query = $this->db->get_where('t_user', $data);
            return $query;
        }

    public function update_password($where, $data) {
            $this->db->update('t_user', $data, $where);
            return $this->db->affected_rows();
    }

    function data_guru($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('m_guru.guru_id', $id);
        //$this->db->join('m_departemen', 'm_departemen.departemen_id = m_students.departemen_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $employee[] = $data;
            }
            return $employee;
        }
    }


    public function GuruCode(){
        $tgl = date("d");
        $bln = date("m");
        $thn = date("y");
          $this->db->select('right(m_guru.nip,2) as kode', FALSE);
          $this->db->order_by('guru_id','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('m_guru');      //cek dulu apakah ada sudah ada kode di tabel.
          if($query->num_rows() <> 0){      
           //jika kode ternyata sudah ada.
           $data = $query->row();      
           $kode = intval($data->kode) + 1;    
          }
          else {      
           //jika kode belum ada
           $kode = 1;    
          }
          $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);
          $kodejadi = "SKNH".$thn.$bln.$tgl.$kodemax;
          return $kodejadi;  
    }
}
