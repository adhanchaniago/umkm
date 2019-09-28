<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function checkAuth($username)
	{
		$this->db->select('
			users.id,
			users.nama_depan,
			users.nama_belakang,
			users.username,
			users.email,
			users.status_account,
			users.password,
			user_level.level_name AS level

		');
		$this->db->from('users');
		$this->db->join('user_level','users.level = user_level.level');
		$this->db->where('username = ', $username);
		$this->db->or_where('email = ', $username);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() == 1) {
			return $query->result();
		} else {
			false;
		}
	}

	public function userVerification($token)
	{
		$this->db->select('
			user_verifications.email, user_verifications.token, 
			user_verifications.expired_time,
			users.status_account
		');
		$this->db->from('user_verifications');
		$this->db->join('
			users', 'users.email = user_verifications.email
		');
		$this->db->where(['token' => $token]);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */