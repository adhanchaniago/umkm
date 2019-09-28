<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	protected
	$app = 'layouts/admin/base',
	$table = [
		'product_category' => 'product_category',
		'products'         => 'products',
		'data_umkm'        => 'data_umkm',
	];

	public function __construct()
	{
		parent::__construct();
		$user_data = $this->session->userdata('user');
		if($user_data['access'] != 'granted') {
			setFlashMessage('error','silahkan login terlebih dahulu','warning');
			redirect('user/login');
		}
		$this->load->model('crud_model','data');
	}

	public function create()
	{
		$user_data   = $this->session->userdata('user');
		$id_uri_umkm = $this->uri->segment(3);
		$umkm_id     = $this->data->getById($this->table['data_umkm'],['user_email' => $user_data['email']])->row()->id;
		$umkm_status     = $this->data->getById($this->table['data_umkm'],['user_email' => $user_data['email']])->row()->status;
		if($id_uri_umkm == $umkm_id && $umkm_status == 'approved') {
			$data = [
				'title'              => 'tambah produk',
				'content'            => 'admin/product/create',
				'umkm_id'            => $umkm_id,
				'product_categories' => $this->data->getAllData($this->table['product_category'])->result()
			];

			$this->load->view($this->app, $data);
		} else {
			setFlashMessage('error','halaman tidak diketemukan','warning');
			redirect('adminumkm/umkm');
		}
	}

	public function store()
	{
		$user_data   = $this->session->userdata('user');
		$id_uri_umkm = $this->uri->segment(3);
		$umkm_id     = $this->data->getById($this->table['data_umkm'],['user_email' => $user_data['email']])->row()->id;
		$umkm_status = $this->data->getById($this->table['data_umkm'],['user_email' => $user_data['email']])->row()->status;
		if($id_uri_umkm == $umkm_id && $umkm_status == 'approved') {
			$_FORM = $this->form_validation;
			$_FORM->set_rules('nama_produk','Nama Produk','required');
			$_FORM->set_rules('deskripsi_produk','Deskripsi Produk','required');
			$_FORM->set_rules('kategori_produk','Kategori Produk','required|callback_productcategoryrules');
			$_FORM->set_message([
				'required'             => '%s harus di isi',
				'productcategoryrules' => '%s harus dipilih'
			]);
			$_FORM->set_error_delimiters('<small  class="form-text text-danger">','</small>');

			if($_FORM->run() === FALSE) {
				$this->create();
			} else {
				$config = [
				'upload_path'   => './uploads/produk/',
				'allowed_types' => 'jpg|jpeg|png',
				'encrypt_name'  => TRUE
				];
		        // load library upload
		        $this->load->library('upload', $config);
		        $this->upload->do_upload('gambar_produk');

				$upload_data   = $this->upload->data();
		      	$gambar_produk = $upload_data['file_name'];

		      	$data = [
		      		'name'         => $this->input->post('nama_produk'),
		      		'image'        => $gambar_produk,
		      		'descriptions' => $this->input->post('deskripsi_produk'),
		      		'link_product' => $this->input->post('link_produk'),
		      		'id_umkm'      => $umkm_id,
		      		'id_category'  => intval($this->input->post('kategori_produk'))
		      	];

		      	$this->data->store($this->table['products'], $data);
		      	setFlashMessage('success','produk berhasil ditambahkan','success');
		      	redirect('adminumkm/umkm');
			}
		} else {
			setFlashMessage('error','halaman tidak diketemukan','warning');
			redirect('adminumkm/umkm');
		}
	}

	public function edit()
	{
		$user_data       = $this->session->userdata('user');
		$id              = $this->uri->segment(3);
		$product         = $this->data->getById($this->table['products'], ['id' => $id]);
		$product_id_umkm = $product->row()->id_umkm;
		$umkm_id         = $this->data->getById($this->table['data_umkm'], ['user_email' => $user_data['email']])->row()->id;
		$umkm_status     = $this->data->getById($this->table['data_umkm'],['user_email' => $user_data['email']])->row()->status;
		if($product->num_rows() == 1 && $user_data['level'] == 'admin' && $umkm_id == $product_id_umkm && $umkm_status == 'approved'){
			$data = [
				'title'              => 'edit produk',
				'content'            => 'admin/product/edit',
				'product'            => $product->row(),
				'product_categories' => $this->data->getAllData($this->table['product_category'])->result()
			];

			$this->load->view($this->app, $data);
		} else {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/adminumkm/umkm');
		}
		
	}

	public function update()
	{
		$id            = $this->uri->segment(3);
		$gambar_produk = $this->data->getById($this->table['products'], ['id' => $id])->row();
		$_FORM         = $this->form_validation;
		$_FORM->set_rules('nama_produk','required');
		$_FORM->set_rules('deskripsi_produk','required');
		$_FORM->set_rules('kategori_produk','required|callback_productcategoryrules');
		$_FORM->set_message([
			'required'             => '%s harus di isi',
			'productcategoryrules' => '%s harus dipilih'
		]);
		$_FORM->set_error_delimiters('<small  class="form-text text-danger">','</small>');
		$config = [
		'upload_path'   => './uploads/produk/',
		'allowed_types' => 'jpg|jpeg|png',
		'encrypt_name'  => TRUE
		];
        // load library upload
        $this->load->library('upload', $config);
        $file_upload = $this->upload->do_upload('gambar_produk');
      	if($file_upload != null) {
        	unlink(FCPATH . './uploads/produk/' . $gambar_produk->image);
			$upload_data   = $this->upload->data();
	      	$gambar_produk = $upload_data['file_name'];
	    } else {
	    	$gambar_produk = $this->input->post('old_gambar_produk');
	    }

      	$data = [
      		'name'         => $this->input->post('nama_produk'),
			'image'        => $gambar_produk,
			'link_product' => $this->input->post('link_produk'),
      		'descriptions' => $this->input->post('deskripsi_produk'),
      		'id_category'  => intval($this->input->post('kategori_produk'))
      	];

      	$this->data->update($this->table['products'], $data,['id' => $id]);
      	setFlashMessage('success','produk berhasil diupdate','success');
      	redirect('adminumkm/umkm');
	}
	public function delete()
	{
		$id      = $this->uri->segment(3);
		$product = $this->data->getById($this->table['products'], ['id' => $id])->row();
		unlink(FCPATH.'./uploads/produk/'.$product->image);
      	$this->data->destroy($this->table['products'],['id' => $id]);

      	setFlashMessage('success','produk berhasil dihapus','success');
      	redirect('adminumkm/umkm');
	}

	public function productCategoryRules()
	{
		if($this->input->post('kategori_produk') == '0') {
			return FALSE;
		} else {
			return TRUE;
		}
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/admin/Product.php */