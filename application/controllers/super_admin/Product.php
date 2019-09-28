<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	protected $app = 'layouts/admin/base',
	$table = 'products';
	
	public function __construct()
	{
		parent::__construct();
		$user_data = $this->session->userdata('user');
		if($user_data['access'] != 'granted') {
			setFlashMessage('error','silahkan login terlebih dahulu','warning');
			redirect('user/login');
		}
		$this->load->model('product_model','product');
	}

	public function index()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'super_admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$data = [
			'title' => 'Data Produk',
			'content' => 'super_admin/product',
			'data_product' => $this->product->getAllDataAdminProduct()
		];

		$this->load->view($this->app, $data);
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/super_admin/Product.php */