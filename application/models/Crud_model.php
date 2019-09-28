<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

	public function getAllData($table, $sort='') 
	{
		if($sort != '')	 {
			$this->db->order_by($sort);
		}
		return $this->db->get($table);
	}

	public function getById($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function store($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function update($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}

	public function destroy($table, $where)
	{
		$this->db->delete($table, $where);
	}

}

/* End of file Crud_model.php */
/* Location: ./application/models/Crud_model.php */