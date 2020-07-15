<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AbsenMDL extends CI_Model
{

	var $table = 't_jadwal';
	var $tableAbsen = 't_absen';
	var $column_order = array('mapel_id', 'nama_mapel');
	var $column_search = array('mapel_id', 'nama_mapel');
	var $order = array('nama_mapel' => 'ASC');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function get_kelas()
    {
        $this->db->order_by('nama_kelas', 'ASC');
        $query = $this->db->get('t_kelas');
        return $query->result_array();
    }

    public function get_mapel()
    {
        $this->db->order_by('nama_mapel', 'ASC');
        $query = $this->db->get('t_mapel');
        return $query->result_array();
    }

    function data_santri($id)
    {
        $this->db->select('*');
        $this->db->from('m_santri');
        $this->db->where('m_santri.kelas_id', $id);
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
			// return $query->result_array();
			
		}
    }

	private function _get_datatables_query()
	{
		$this->db->where('m_guru.guru_id', $this->session->userdata('guru_id'));
		$this->db->from($this->table);
		$this->db->join('t_mapel', 't_mapel.mapel_id = t_jadwal.mapel_id', 'left');
		$this->db->join('m_guru', 'm_guru.guru_id = t_jadwal.guru_id', 'left');
		$this->db->join('t_kelas', 't_kelas.kelas_id = t_jadwal.kelas_id', 'left');

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
		$this->db->where('mapel_id', $id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->tableAbsen, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('mapel_id', $id);
		$this->db->delete($this->table);
	}
}
