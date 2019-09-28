<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	protected $app = 'layouts/admin/base',
	$table = 'blog';

	public function __construct()
	{
		parent::__construct();
		$user_data = $this->session->userdata('user');
		if($user_data['access'] != 'granted') {
			setFlashMessage('error','silahkan login terlebih dahulu','warning');
			redirect('user/login');
		}
		$this->load->model('blog_model','blog');
	}

	public function index()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'super_admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$data = [
			'title' => 'Data Blog',
			'content' => 'super_admin/blog',
			'data_blog' => $this->blog->adminAllGetDataBlog()
		];

		$this->load->view($this->app, $data);
	}
}

/* End of file Blog.php */
/* Location: ./application/controllers/super_admin/Blog.php */