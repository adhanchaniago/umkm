<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	protected
	$app = 'layouts/admin/base',
	$table = 'data_umkm';

	public function __construct()
	{
		parent::__construct();
		$user_data = $this->session->userdata('user');
		if($user_data['access'] != 'granted') {
			setFlashMessage('error','silahkan login terlebih dahulu','warning');
			redirect('user/login');
		}
		$this->load->model('crud_model','data');
		$this->load->model('product_model','product');
		$this->load->model('blog_model','blog');
		$this->load->model('umkm_model','umkm');
	}
	public function index()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'super_admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$total_product            = $this->product->adminGetCountDataProduct();
		$total_blog               = $this->blog->adminGetCountDataBlog();
		$lastest_submited_product = $this->product->adminLastestSubmitedProduct()->row();
		$lastest_submited_blog    = $this->blog->adminLastestSubmitedBlog()->row();
		$lastest_submited_blog    = $this->blog->adminLastestSubmitedBlog()->row();
		$total_registered_umkm    = $this->umkm->adminGetCountDataUmkm();
		$total_not_approved_umkm  = $this->umkm->adminGetCountDataUmkmByStatus('not_approved');
		$total_approved_umkm      = $this->umkm->adminGetCountDataUmkmByStatus('approved');
		$data = [
			'title'                    => 'dashboard',
			'content'                  => 'super_admin/home',
			'notification'             => getFlashMessage(),
			'total_product'            => $total_product,
			'total_blog'               => $total_blog,
			'lastest_submited_blog'    => $lastest_submited_blog,
			'lastest_submited_product' => $lastest_submited_product,
			'total_registered_umkm'    => $total_registered_umkm,
			'total_not_approved_umkm'  => $total_not_approved_umkm,
			'total_approved_umkm'      => $total_approved_umkm
		];

		$this->load->view($this->app, $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/super_admin/Home.php */