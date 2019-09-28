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
	}

	public function index()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'super_admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$data = [
			'title' => 'data pengumuman',
			'content' => 'super_admin/announcement/announcement',
			'notification' => getFlashMessage(),
			'announcements' => $this->data->getAllData($this->table)->result()
		];

		$this->load->view($this->app, $data);
	}

	public function create()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'super_admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$data = [
			'title' => 'buat pengumuman',
			'content' => 'super_admin/announcement/create'
		];

		$this->load->view($this->app, $data);
	}

	public function store() 
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'super_admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$_FORM = $this->form_validation;
		$_FORM->set_rules('announcement_title','Judul Pengumuman','required');
		$_FORM->set_rules('announcement_content','Isi Pengumuman','required');
		$_FORM->set_message('required','%s harus di isi');
		$_FORM->set_error_delimiters('<div class="alert alert-warning">','</div>');

		if($_FORM->run() == FALSE) {
			$this->create();
		} else {
			$data = [
				'title' => $this->input->post('announcement_title'),
				'slug' => url_title($this->input->post('announcement_title')),
				'content' => $this->input->post('announcement_content')
			];

			$this->data->store($this->table, $data);
			setFlashMessage('success','pengumuman berhasil dibuat','success');
			redirect('superadmin/announcement');
		}

	}

	public function show()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'super_admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$slug = $this->uri->segment(3);
		$announcement = $this->data->getById($this->table, ['slug' => $slug]);
		if($announcement->num_rows() == 1) {
			$data = [
				'title' => 'detail pengumuman',
				'content' => 'super_admin/announcement/detail',
				'announcement' => $announcement->row()
			];

			$this->load->view($this->app, $data);
		} else {
			setFlashMessage('error','data yang anda cari tidak diketemukan','warning');
			redirect('superadmin/announcement');
		}
	}

	public function edit()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'super_admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$id = $this->uri->segment(3);
		$announcement = $this->data->getById($this->table, ['id' => $id]);
		if($announcement->num_rows() == 1) {
			$data = [
				'title' => 'edit pengumuman',
				'content' => 'super_admin/announcement/edit',
				'announcement' => $announcement->row()
			];

			$this->load->view($this->app, $data);
		} else {
			setFlashMessage('error','data yang anda cari tidak diketemukan','warning');
			redirect('superadmin/announcement');
		}
	}

	public function update()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'super_admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$_FORM = $this->form_validation;
		$_FORM->set_rules('announcement_title','Judul Pengumuman','required');
		$_FORM->set_rules('announcement_content','Isi Pengumuman','required');
		$_FORM->set_message('required','%s harus di isi');
		$_FORM->set_error_delimiters('<div class="alert alert-warning">','</div>');

		if($_FORM->run() == FALSE) {
			$this->create();
		} else {
			$id = $this->uri->segment(3);
			$data = [
				'title'   => $this->input->post('announcement_title'),
				'slug'    => url_title($this->input->post('announcement_title')),
				'content' => $this->input->post('announcement_content')
			];

			$this->data->update($this->table, $data, ['id' => $id]);
			setFlashMessage('success','pengumuman berhasil diupdate','success');
			redirect('superadmin/announcement');
		}
	}

	public function destroy()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'super_admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$id = $this->uri->segment(3);
		if($this->data->getById($this->table,['id' => $id])->num_rows() == 1) {
			$this->data->destroy($this->table, ['id' => $id]);
			setFlashMessage('success','data pengumuman berhasil dihapus','success');
			redirect('superadmin/announcement');
		}
	}

}

/* End of file Announcement.php */
/* Location: ./application/controllers/super_admin/Announcement.php */