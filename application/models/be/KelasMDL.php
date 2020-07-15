<?php defined('BASEPATH') or exit('No direct script access allowed');

class KelasMDL extends CI_Model
{

    var $table  = 't_kelas';
    var $column_order = array('kode_tingkat', 'nama_kelas', 'nama_guru', 'waktu');
    var $column_search = array('kode_tingkat', 'nama_kelas', 'nama_guru', 'waktu');
    var $order = array('nama_kelas'  => 'asc',);

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_tingkat()
    {
        $this->db->order_by('tingkat_id', 'ASC');
        $query = $this->db->get('t_tingkat');
        return $query->result_array();
    }

    public function get_guru()
    {
        $this->db->where('status_guru', '1');
        $this->db->order_by('guru_id', 'ASC');
        $query = $this->db->get('m_guru');
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

    public function getDataJoin($tbl1,$tbl2,$field,$id1,$id2,$key,$args) {
        $this->db->select($field);
        $this->db->from($tbl1);
        $this->db->join($tbl2, $id1.'='.$id2);
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
        $this->db->join('t_tingkat', 't_tingkat.tingkat_id = t_kelas.tingkat_id', 'left');
        $this->db->join('m_guru', 'm_guru.nip = t_kelas.nip', 'left');

        $i = 0;

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, strtoupper($_POST['search']['value']));
                } else {
                    $this->db->or_like($item, strtoupper($_POST['search']['value']));
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
        $this->db->join('t_tingkat', 't_tingkat.tingkat_id = t_kelas.tingkat_id', 'left');
        $this->db->where('t_kelas.kelas_id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('kelas_id', $id);
        $this->db->delete($this->table);
    }

    function data_guru($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('t_kelas.kelas_id', $id);
        //$this->db->join('m_departemen', 'm_departemen.departemen_id = m_students.departemen_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $employee[] = $data;
            }
            return $employee;
        }
    }
}
