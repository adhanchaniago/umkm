<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest_blog extends CI_Controller {

	protected
	$app = 'layouts/guest/base',
	$table = 'blog';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pagination_model','m_data');
		$this->load->model('crud_model','data');
	}

	public function index()
	{
		$config = [
			'base_url'   => base_url('blog'),
			'total_rows' => $this->db->count_all('blog'),
			'per_page'   => 2,
			'uri_segment' => 2 
		];
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_link'] = floor($choice);
		// bootstap pagination set
		$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '<nav></ul>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = ['class' => 'page-link'];
		// end bootstap pagination set


		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data = [
			'title'        => 'blog',
			'content'      => 'guest/blog/blog',
			'notification' => getFlashMessage(),
			'blogs'        => $this->m_data->data($this->table,$config['per_page'],$data['page']),
		];

		$this->load->view($this->app, $data);
	}

	public function guestBlogDetail()
	{
		$id        = $this->uri->segment(2);
		$blog      = $this->data->getById('blog', ['slug' => $id]);
		$umkm_name = $this->data->getById('data_umkm', ['id' => $blog->row()->id_umkm])->row()->name;
		if($blog->num_rows() == 1) {
			$data = [
				'title'     => 'blog detail',
				'content'   => 'guest/blog/detail',
				'blog'      => $blog->row(),
				'umkm_name' => $umkm_name,
			];
			$this->load->view($this->app, $data);
		} else {
			setFlashMessage('error','blog yang anda cari tidak tersedia','warning');
			redirect('umkm/blog');
		}
	}

}

/* End of file Guest_blog.php */
/* Location: ./application/controllers/Guest_blog.php */