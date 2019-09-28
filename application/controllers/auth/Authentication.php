<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('hashing');
		$this->load->model('auth_model','auth');
	}

	public function login()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['access'] == 'granted') {
			if($user_data['level'] == 'super_admin') {
				setFlashMessage('error','anda sudah login','info');
				redirect('superadmin/dashboard');
			} else if($user_data['level'] == 'admin') {
				setFlashMessage('error','anda sudah login','info');
				redirect('adminumkm/dashboard');
			}
		}
		$data = [
			'title'        => 'Masuk UMKM',
			'notification' => getFlashMessage()
		];
		$this->load->view('layouts/admin/header', $data);
		$this->load->view('pages/auth/login', $data);
		$this->load->view('layouts/admin/scripts');
	}

	public function checkAuth()
	{
		$_FORM = $this->form_validation;
		$_FORM->set_rules('username_or_email','Email atau Username','required');
		$_FORM->set_rules('password','Email atau Username','required');
		$_FORM->set_message('required','%s harus di isi');
		$_FORM->set_error_delimiters('<div class="alert alert-danger">','</div>');

		if($_FORM->run() == FALSE) {
			$this->login();
		} else {
			$username    = $this->input->post('username_or_email');
			$password    = $this->input->post('password');
			$user_exists = $this->auth->checkAuth($username);

			if($user_exists) {
				foreach($user_exists as $user);
				$password_valid = $this->hashing->hash_verify($password, $user->password);
				if($password_valid) {
					$session_data = [
						'user_id' => $user->id,
						'username' => $user->username,
						'fullname' => $user->nama_depan.' '.$user->nama_belakang,
						'email'    => $user->email,
						'level'    => $user->level,
						'access'   => 'notgranted',
					];
					if($user->status_account == 'verified') {
						$session_data['access'] = 'granted';
						if($user->level == 'super_admin') {
							$this->session->set_userdata('user', $session_data);
							redirect('superadmin/dashboard');
						} else if($user->level == 'admin') {
							$this->session->set_userdata('user', $session_data);
							redirect('adminumkm/dashboard');
						} else {
							$this->session->unset_userdata('user');
							$this->session->sess_destroy();
							setFlashMessage('error','terjadi kesalahan system','danger');
							redirect('user/login');
						}
					} else {
						setFlashMessage('error','akun anda belum diverifikasi, silahkan cek link verifikasi pada email anda yang sudah terdaftar','info');
						redirect('user/login');
					}
				} else {
					setFlashMessage('error','maaf password yang anda masukkan tidak valid','warning');
					$this->login();
				}
			} else {
				setFlashMessage('error','username atau email tidak diketemukan','danger');
				redirect('user/login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->sess_destroy();
		redirect('/');
	}

}

/* End of file Authentication.php */
/* Location: ./application/controllers/Auth/Authentication.php */