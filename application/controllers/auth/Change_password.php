<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {
	private 
	$app = 'layouts/admin/base',
	$table_users = 'users';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model','auth');
	}
	public function index()
	{
		$id = $this->uri->segment(3);
		$userdata = $this->session->userdata('user');
		if($userdata['user_id'] == $id) {
			$data = [
				'title' => 'Ubah Password',
				'content' => 'auth/change_password',
				'notification' => getFlashMessage()
			];

			$this->load->view($this->app, $data);
		} else {
			setFlashMessage('error','anda hanya bisa menghapus password milik anda','warning');
			redirect('user/change-password/'.$userdata['user_id']);
		}
	}

}

/* End of file Change_password.php */
/* Location: ./application/controllers/auth/Change_password.php */