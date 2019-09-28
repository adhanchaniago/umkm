<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination_model extends CI_Model {

	function data($table, $limit, $start)
	{
		return $this->db->get($table, $limit, $start)->result();
	}

}

/* End of file Pagination_model.php */
/* Location: ./application/models/Pagination_model.php */