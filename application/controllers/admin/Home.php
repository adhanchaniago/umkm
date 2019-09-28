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
	}
	public function index()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$umkm                     = $this->data->getById($this->table, ['user_email' => $user_data['email']]);
		$umkm_id                  = !empty($umkm->row()->id) ?  $umkm->row()->id : 0;
		$total_product            = $this->product->getCountDataProduct($umkm_id);
		$lastest_submited_product = $this->product->lastestSubmitedProduct($umkm_id)->row();
		$total_blog               = $this->blog->getCountDataBlog($umkm_id);
		$lastest_submited_blog    = $this->blog->lastestSubmitedBlog($umkm_id)->row();
		$data = [
			'title'                    => 'dashboard',
			'content'                  => 'admin/home',
			'notification'             => getFlashMessage(),
			'total_product'            => $total_product,
			'total_blog'               => $total_blog,
			'lastest_submited_blog'    => $lastest_submited_blog,
			'lastest_submited_product' => $lastest_submited_product,
		];

		$this->load->view($this->app, $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/super_admin/Home.php */