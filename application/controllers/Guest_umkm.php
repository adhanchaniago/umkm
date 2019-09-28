<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest_umkm extends CI_Controller {

	protected
		$app = 'layouts/guest/base',
		$table = 'data_umkm';

		public function __construct()
		{
			parent::__construct();
			$this->load->model('pagination_model','m_data');
			$this->load->model('crud_model','data');
			$this->load->model('umkm_model','umkm');
		}

	public function index()
	{
		$config = [
			'base_url'   => base_url('umkm'),
			'total_rows' => $this->db->count_all('data_umkm'),
			'per_page'   => 1,
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
			'title'        => 'umkm',
			'content'      => 'guest/umkm/umkm',
			'notification' => getFlashMessage(),
			'data_umkm'        => $this->m_data->data($this->table,$config['per_page'],$data['page']),
		];

		$this->load->view($this->app, $data);
	}

	public function guestUmkmDetail()
	{
		$id       = $this->uri->segment(2);
		$umkm     = $this->data->getById($this->table, ['id' => $id]);
		$users = $this->data->getById('users', ['email' => $umkm->row()->user_email])->row();
		$products = $this->umkm->allProductByIdUmkm($umkm->row()->id);
		$blogs    = $this->umkm->allBlogByIdUmkm($umkm->row()->id);
		$owner = $users->nama_depan.' '.$users->nama_belakang;

		if($umkm->num_rows() == 1) {
			$data = [
				'title'    => 'umkm detail',
				'content'  => 'guest/umkm/detail',
				'umkm'     => $umkm->row(),
				'products' => $products->result(),
				'blogs'    => $blogs->result(),
				'owner'    => $owner
			];

			$this->load->view($this->app,$data);
		} else {
			setFlashMessage('error','umkm yang anda cari tidak tersedia','warning');
			redirect('umkm');
		}
	}

}

/* End of file Guest_umkm.php */
/* Location: ./application/controllers/Guest_umkm.php */