<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function getDataAdminProduct($id_umkm)
	{
		$this->db->select('
			products.id,
			products.name AS product_name,
			products.image,
			products.descriptions,
			products.created_at,
			product_category.category_name AS cat_name,
			data_umkm.name AS umkm_name
		');
		$this->db->from('products');
		$this->db->join('product_category', 'products.id_category = product_category.id','inner');
		$this->db->join('data_umkm', 'products.id_umkm = data_umkm.id','inner');
		$this->db->where(['products.id_umkm' => $id_umkm]);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	public function getCountDataProduct($id_umkm)
	{
		$this->db->from('products');
		$this->db->where(['id_umkm' => $id_umkm]);
		$result = $this->db->count_all_results();
		return $result;
	}

	public function lastestSubmitedProduct($id_umkm)
	{
		$this->db->select('
			name,
			image,
			created_at
		');
		$this->db->from('products');
		$this->db->where(['id_umkm' => $id_umkm]);
		$this->db->order_by('created_at','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}

	// =============================SUPER ADMIN PRODUCT MODEL====================================
	public function adminGetCountDataProduct()
	{
		$this->db->from('products');
		$result = $this->db->count_all_results();
		return $result;
	}

	public function adminLastestSubmitedProduct()
	{
		$this->db->select('
			products.name,
			image,
			products.created_at,
			data_umkm.name as umkm_name,
			users.nama_depan,
			users.nama_belakang,
			users.email
		');
		$this->db->from('products');
		$this->db->join('data_umkm','products.id_umkm = data_umkm.id');
		$this->db->join('users','users.email = data_umkm.user_email');
		$this->db->order_by('created_at','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;	
	}

	public function getAllDataAdminProduct()
	{
		$this->db->select('
			products.id,
			products.name AS product_name,
			products.image,
			products.descriptions,
			products.created_at,
			product_category.category_name AS cat_name,
			data_umkm.name AS umkm_name,
			users.nama_depan,
			users.nama_belakang,
			users.email,
		');
		$this->db->from('products','data_umkm');
		$this->db->join('product_category', 'products.id_category = product_category.id','inner');
		$this->db->join('data_umkm', 'products.id_umkm = data_umkm.id','inner');
		$this->db->join('users', 'data_umkm.user_email = users.email','inner');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
// ======================GUEST PRODUCT MODEL==========================
	public function guestProductInterest($table, $category, $order)
	{
		$this->db->from($table);
		$this->db->where($category);
		$this->db->order_by($order);
		$this->db->limit(4);
		$query = $this->db->get();
		return $query;
	}

	public function guestSimilarProduct($table, $category)
	{
		$this->db->from($table);
		$this->db->where($category);
		$query = $this->db->get();
		return $query;
	}

	public function guestProductByCatId($table,$limit,$start,$where)
	{
		$this->db->where($where);
		return $this->db->get($table, $limit, $start)->result();
	}

	public function guestTotalRowProductId($table, $category)
	{
		$this->db->from($table);
		$this->db->where($category);
		$query = $this->db->count_all_results();
		return $query;
	}

}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */