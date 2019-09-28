<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement_model extends CI_Model {
	public function getLatestAnnouncement()
	{
		$this->db->select('*');
		$this->db->from('announcement');
		$this->db->order_by('created_at','desc');
		$this->db->limit(1);
		return $this->db->get();
	}
	

}

/* End of file Announcement_model.php */
/* Location: ./application/models/Announcement_model.php */