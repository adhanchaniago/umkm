<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_registration extends CI_Controller {
	protected
	$table = [
		'users'              => 'users',
		'user_verifications' => 'user_verifications'
	];

	public function __construct()
	{
		parent::__construct();
		$this->load->library([
			'hashing','token_generator'
		]);
		$this->load->model('crud_model','registration');
	}

	public function register()
	{
		$data = [
			'title'        => 'Daftar UMKM',
			'notification' => getFlashMessage()
		];

		$this->load->view('layouts/admin/header', $data);
		$this->load->view('pages/auth/register', $data);
		$this->load->view('layouts/admin/scripts');
	}

	public function store()
	{
		$_FORM = $this->form_validation;
		$_FORM->set_rules('nama_depan','Nama Depan','required');
		$_FORM->set_rules('nama_belakang','Nama Belakang','required');
		$_FORM->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$_FORM->set_rules('email','Email', 'trim|required|valid_email|valid_emails|is_unique[users.email]');
		$_FORM->set_rules('password','Password', 'required|min_length[8]');
		$_FORM->set_rules('konfirmasi_password','Konfirmasi Password', 'required|min_length[8]|matches[password]');
		$_FORM->set_message([
			'required'      => '%s harus di isi',
			'min_length' => '%s minimal 8 karakter',
			'is_unique'     => '%s sudah terdaftar',
			'matches'       => '%s harus sama'
		]);
		$_FORM->set_error_delimiters('<div class="alert alert-danger">','</div>');

		if($_FORM->run() == FALSE){
			$this->register();
		}else{
			// input data registrasi ke database user
			$hashed_password = $this->hashing->hash_string($this->input->post('password'));
			$data = [
				'nama_depan'    => $this->input->post('nama_depan'),
				'nama_belakang' => $this->input->post('nama_belakang'),
				'username'      => $this->input->post('username'),
				'email'         => strtolower($this->input->post('email')),
				'password'      => $hashed_password,
			];
			$this->registration->store($this->table['users'], $data);

			// membuat token untuk verifikasi user
			$randomNumber = $this->token_generator->crypto_rand_secure(50, 100);
			$data_token = [
				'email'        => $data['email'],
				'token'        => $this->token_generator->getToken($randomNumber),
				'created_time' => date('Y:m:d H:i'),
				'expired_time' => date('Y:m:d H:i', strtotime('+1 hour'))
			];
			$this->registration->store($this->table['user_verifications'], $data_token);

			// membuat data yang akan ditampilkan email ke user
			$email_data = [
				'fullname' => $data['nama_depan'].' '.$data['nama_belakang'],
				'token'    => $data_token['token']
			];

			// configurasi email yang akan dikirim
			$message_config = [
				'recipients'  => $data['email'],
				'subject'     => 'User Verification',
				'htmlContent' => $this->load->view('pages/email/user_verifications', $email_data, true),
				'message'     => setFlashMessage('success','anda berhasil mendaftar silahkan check email anda '.$data['email'].' untuk melakukan verifikasi','success')
			];
			// mengirimkan email ke user
			sendEmail($message_config, 'user/login');
		}
	}

}

/* End of file User_registration.php */
/* Location: ./application/controllers/auth/User_registration.php */