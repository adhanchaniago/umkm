<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public function getDataAdminBlog($id_umkm)
	{
		$this->db->select('
			blog.id,
			blog.title,
			blog.tumbnail,
			blog.content,
			blog.slug,
			blog.created_at,
			data_umkm.name AS umkm_name
		');
		$this->db->from('blog');
		$this->db->join('data_umkm','blog.id_umkm = data_umkm.id','inner');
		$this->db->where(['blog.id_umkm' => $id_umkm]);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	public function getCountDataBlog($id_umkm)
	{
		$this->db->from('blog');
		$this->db->where(['id_umkm' => $id_umkm]);
		$result = $this->db->count_all_results();
		return $result;
	}

	public function lastestSubmitedBlog($id_umkm)
	{
		$this->db->select('
			title,
			tumbnail,
			created_at
		');
		$this->db->from('blog');
		$this->db->where(['id_umkm' => $id_umkm]);
		$this->db->order_by('created_at','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}
	
	// ===========================SUPER ADMIN BLOG MODEL===================================
	public function adminGetCountDataBlog()
	{
		$this->db->from('blog');
		$result = $this->db->count_all_results();
		return $result;
	}

	public function adminLastestSubmitedBlog()
	{
		$this->db->select('
			title,
			tumbnail,
			blog.created_at,
			data_umkm.name as umkm_name,
			users.nama_depan,
			users.nama_belakang,
			users.email
		');
		$this->db->from('blog','data_umkm');
		$this->db->join('data_umkm','blog.id_umkm = data_umkm.id');
		$this->db->join('users','users.email = data_umkm.user_email');
		$this->db->order_by('created_at','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}

	public function adminAllGetDataBlog()
	{
		$this->db->select('
			blog.id,
			blog.title,
			blog.tumbnail,
			blog.slug,
			blog.created_at,
			data_umkm.name AS umkm_name,
			users.nama_depan,
			users.nama_belakang,
			users.email,
		');
		$this->db->from('blog','data_umkm');
		$this->db->join('data_umkm','blog.id_umkm = data_umkm.id','inner');
		$this->db->join('users','data_umkm.user_email = users.email','inner');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
}

/* End of file Blog_model.php */
/* Location: ./application/models/Blog_model.php */