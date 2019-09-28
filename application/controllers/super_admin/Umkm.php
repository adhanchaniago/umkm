<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umkm extends CI_Controller {
	protected $app = 'layouts/admin/base',
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
		$this->load->model('umkm_model','umkm');
	}

	public function index()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'super_admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$data = [
			'title' => 'Data Umkm',
			'content' => 'super_admin/umkm',
			'notification' => getFlashMessage(),
			'data_umkm' => $this->umkm->adminAllGetDataUmkm()
		];

		$this->load->view($this->app, $data);
	}

	public function approvedUmkm()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'super_admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		$id      = $this->uri->segment(3);
		$umkm    = $this->data->getById($this->table, ['id' => $id]);
		$umkm_id = !empty($umkm->row()->id) ? $umkm->row()->id : false ;
		if($umkm->num_rows() == 1 && $id == $umkm_id) {
			$this->data->update($this->table, ['status' => 'approved'], ['id' => $id]);
			setFlashMessage('success','Umkm Berhasil Di Approve','success');
			redirect('superadmin/umkm');
		} else {
			setFlashMessage('error','Data Umkm tidak diketemukan','warning');
			redirect('superadmin/umkm');
		}
	}

}

/* End of file Umkm.php */
/* Location: ./application/controllers/super_admin/Umkm.php */