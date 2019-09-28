<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends CI_Controller {
	protected
	$app = 'layouts/admin/base',
	$table = 'announcement';

	public function __construct()
	{
		parent::__construct();
		$user_data = $this->session->userdata('user');
		if($user_data['access'] != 'granted') {
			setFlashMessage('error','silahkan login terlebih dahulu','warning');
			redirect('user/login');
		}
		$this->load->model('crud_model','data');
		$this->load->model('announcement_model','announcement');
	}

	public function index()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$data = [
			'title' => 'data pengumuman',
			'content' => 'admin/announcement/announcement',
			'notification' => getFlashMessage(),
			'announcements' => $this->data->getAllData($this->table,'created_at DESC')->result(),
			'latest_announcement' => $this->announcement->getlatestannouncement()->row()
		];

		$this->load->view($this->app, $data);
	}

	public function show()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$slug = $this->uri->segment(3);
		$announcement = $this->data->getById($this->table, ['slug' => $slug]);
		if($announcement->num_rows() == 1) {
			$data = [
				'title' => 'detail pengumuman',
				'content' => 'admin/announcement/detail',
				'announcement' => $announcement->row()
			];

			$this->load->view($this->app, $data);
		} else {
			setFlashMessage('error','data yang anda cari tidak diketemukan','warning');
			redirect('superadmin/announcement');
		}
	}

}

/* End of file Announcement.php */
/* Location: ./application/controllers/admin/Announcement.php */