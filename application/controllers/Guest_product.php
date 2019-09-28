<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest_product extends CI_Controller {
	protected
	$app = 'layouts/guest/base',
	$table = 'products';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model','product');
		$this->load->model('pagination_model','m_data');
		$this->load->model('crud_model','data');
	}

	// public function index()
	// {
	// 	$data = [
	// 		'title'          => 'produk',
	// 		'content'        => 'guest/product/product',
	// 		'categories'     => $this->data->getAllData('product_category')->result(),
	// 		'notification'   => getFlashMessage(),
	// 		'data_batik'     => $this->product->guestProductInterest($this->table, ['id_category' => 1], 'created_at desc')->result(),
	// 		'data_sepatu'    => $this->product->guestProductInterest($this->table, ['id_category' => 2], 'created_at desc')->result(),
	// 		'data_oleh_oleh' => $this->product->guestProductInterest($this->table, ['id_category' => 4], 'created_at desc')->result(),
	// 	];

	// 	$this->load->view($this->app, $data);
	// }

	public function productCategory()
	{
		$config = [
			'base_url'    => base_url('product'),
			'total_rows'  => $this->db->count_all('products'),
			'per_page'    => 1,
			'uri_segment' => 2 
		];
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_link']        = floor($choice);
		// bootstap pagination set
		$config['full_tag_open']   = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
		$config['full_tag_close']  = '<nav></ul>';

		$config['first_link']      = 'First';
		$config['first_tag_open']  = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link']       = 'Last';
		$config['last_tag_open']   = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';

		$config['next_link']       = '&raquo';
		$config['next_tag_open']   = '<li class="page-item">';
		$config['next_tag_close']  = '</li>';

		$config['prev_link']       = '&laquo';
		$config['prev_tag_open']   = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';

		$config['cur_tag_open']    = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']   = '</a></li>';

		$config['num_tag_open']    = '<li class="page-item">';
		$config['num_tag_close']   = '</li>';

		$config['attributes']      = ['class' => 'page-link'];
		// end bootstap pagination set


		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data = [
			'title'         => 'produk',
			'content'       => 'guest/product/product',
			'notification'  => getFlashMessage(),
			'products'      => $this->m_data->data($this->table,$config['per_page'],$data['page']),
		];

		$this->load->view($this->app, $data);
	}

	public function productDetail()
	{
		$id               = $this->uri->segment(2);
		$product          = $this->data->getById($this->table, ['id' => $id]);
		$similar_products = $this->product->guestSimilarProduct($this->table, ['id_category' => $product->row()->id_category]);
		$umkm  = $this->data->getById('data_umkm',['id' => $product->row()->id_umkm]);
		$user  = $this->data->getById('users', ['email' => $umkm->row()->user_email])->row();
		$owner = $user->nama_depan.' '.$user->nama_belakang;

		if($product->num_rows() == 1) {
			$data = [
				'title'            => 'detail produk',
				'content'          => 'guest/product/detail',
				'product'          => $product->row(),
				'umkm'             => $umkm->row(),
				'owner'	           => $owner,
				'similar_products' => $similar_products->result()
			];

			$this->load->view($this->app, $data);
		} else {
			setFlashMessage('error','product yang anda cari tidak tersedia','warning');
			redirect('umkm/product');
		}
	}

	public function productByCategory()
	{
		$cat_product_id     = $this->uri->segment(3);
		$category_name = $this->data->getById('product_category',['id' => $cat_product_id])->row()->category_name;
		$product_by_id      = $this->product->guestSimilarProduct($this->table, ['id_category' => $cat_product_id]);
		$product_total_rows = $this->product->guestTotalRowProductId($this->table, ['id_category' => $cat_product_id]);
		$config = [
			'base_url'    => base_url('product/ct/'.$cat_product_id.'/p'),
			'total_rows'  => $product_total_rows,
			'per_page'    => 2,
			'uri_segment' => 5
		];
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_link']        = floor($choice);
		// bootstap pagination set
		$config['full_tag_open']   = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
		$config['full_tag_close']  = '<nav></ul>';

		$config['first_link']      = 'First';
		$config['first_tag_open']  = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link']       = 'Last';
		$config['last_tag_open']   = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';

		$config['next_link']       = '&raquo';
		$config['next_tag_open']   = '<li class="page-item">';
		$config['next_tag_close']  = '</li>';

		$config['prev_link']       = '&laquo';
		$config['prev_tag_open']   = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';

		$config['cur_tag_open']    = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']   = '</a></li>';

		$config['num_tag_open']    = '<li class="page-item">';
		$config['num_tag_close']   = '</li>';

		$config['attributes']      = ['class' => 'page-link'];
		// end bootstap pagination set


		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$data = [
			'title'                 => 'produk berdasarkan kategori',
			'content'               => 'guest/product/product_id',
			'categories'            => $this->data->getAllData('product_category')->result(),
			'category_name'         => $category_name,
			'notification'          => getFlashMessage(),
			'product_by_categories' => $this->product->guestProductByCatId($this->table,$config['per_page'],$data['page'],['id_category' => $cat_product_id]),
		];

		$this->load->view($this->app, $data);
		
	}

	public function guestAllProductCategory()
	{
		$config = [
			'base_url'   => base_url('all-product'),
			'total_rows' => $this->db->count_all('products'),
			'per_page'   => 8,
			'uri_segment' => 2 
		];
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_link']        = floor($choice);
		// bootstap pagination set
		$config['full_tag_open']   = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
		$config['full_tag_close']  = '<nav></ul>';

		$config['first_link']      = 'First';
		$config['first_tag_open']  = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link']       = 'Last';
		$config['last_tag_open']   = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';

		$config['next_link']       = '&raquo';
		$config['next_tag_open']   = '<li class="page-item">';
		$config['next_tag_close']  = '</li>';

		$config['prev_link']       = '&laquo';
		$config['prev_tag_open']   = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';

		$config['cur_tag_open']    = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']   = '</a></li>';

		$config['num_tag_open']    = '<li class="page-item">';
		$config['num_tag_close']   = '</li>';

		$config['attributes']      = ['class' => 'page-link'];
		// end bootstap pagination set


		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data = [
			'title'                  => 'semua produk',
			'content'                => 'guest/product/product_all',
			'notification'           => getFlashMessage(),
			'all_product_categories' => $this->m_data->data($this->table,$config['per_page'],$data['page']),
		];

		$this->load->view($this->app, $data);
	}
}

/* End of file Guest_product.php */
/* Location: ./application/controllers/Guest_product.php */