<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umkm_model extends CI_Model {

	public function getDataAdminUmkm($email)
	{
		$this->db->select('
			du.id as umkm_id,
			du.name,
			du.address,
			du.vision,
			du.mision,
			du.status,
			du.business_form,
			du.user_email as email,
			business_type.bussines_type,
			business_type.id as business_type_id,
			users.nama_depan,
			users.nama_belakang,
			users.id as user_id,
		');
		$this->db->from('
			data_umkm AS du
		');
		$this->db->join('business_type', 'du.id_business_type = business_type.id');
		$this->db->join('users', 'du.user_email = users.email');
		$this->db->where('du.user_email = ', $email);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->row();
		}else{
			return false;
		}
	}

	// =========================SUPER ADMIN UMKM MODEL================================
	public function adminGetCountDataUmkm()
	{
		$this->db->from('data_umkm');
		$query = $this->db->count_all_results();
		return $query;
	}

	public function adminGetCountDataUmkmByStatus($status)
	{
		$this->db->from('data_umkm AS du');
		$this->db->where('du.status = ', $status);
		$query = $this->db->count_all_results();
		return $query;
	}

	public function adminAllGetDataUmkm()
	{
		$this->db->select('
			du.id as umkm_id,
			du.name,
			du.address,
			du.vision,
			du.mision,
			du.status,
			du.business_form,
			du.user_email as email,
			du.created_at,
			business_type.bussines_type,
			users.nama_depan,
			users.nama_belakang
		');
		$this->db->from('
			data_umkm AS du
		');
		$this->db->join('business_type', 'du.id_business_type = business_type.id');
		$this->db->join('users', 'du.user_email = users.email');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function allProductByIdUmkm($id_umkm)
	{
		$this->db->select('
			products.id,
			products.name AS product_name,
			products.image,
			data_umkm.name AS umkm_name
		');
		$this->db->from('products');
		$this->db->join('product_category', 'products.id_category = product_category.id','inner');
		$this->db->join('data_umkm', 'products.id_umkm = data_umkm.id','inner');
		$this->db->where(['products.id_umkm' => $id_umkm]);
		return $query = $this->db->get();
	}

	public function allBlogByIdUmkm($id_umkm)
	{
		$this->db->select('
			blog.id,
			blog.title,
			blog.tumbnail,
			blog.content,
			blog.created_at,
			data_umkm.name AS umkm_name
		');
		$this->db->from('blog');
		$this->db->join('data_umkm','blog.id_umkm = data_umkm.id','inner');
		$this->db->where(['blog.id_umkm' => $id_umkm]);
		return $query = $this->db->get();
	}
}

/* End of file Umkm_model.php */
/* Location: ./application/models/Umkm_model.php */