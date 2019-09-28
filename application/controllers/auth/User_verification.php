<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_verification extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library([
			'hashing','token_generator'
		]);
		$this->load->model('auth_model','auth');
		$this->load->model('crud_model','users');
	}
	public function index()
	{
		$token  = $this->input->get('token');
		$result = $this->auth->userVerification($token);
		if($result){
			foreach($result as $user);
			$time_now = date('Y:m:d H:i');
			if($time_now <= $user->expired_time) {
				if($user->status_account != 'verified') {
					$this->users->update('users',['status_account' => 'verified'], ['email' => $user->email]);
					setFlashMessage('success','akun anda berhasil diverifikasi silahkan melakukan login','success');
					redirect('user/login');
				}else{
				setFlashMessage('error','akun anda sudah anda verifikasi sebelumnya silahkan login untuk masuk','info');
				redirect('user/login');
				}
			}else{
			setFlashMessage('error','gagal verifikasi, kemungkinan token tidak valid atau sudah expired, untuk melakukan verifikasi ulang silahkan klik link ini '.anchor('user/verifications/request', 'resend verifications', ['class' => 'btn btn-sm btn-info']).'','danger');	
			redirect('user/login');
			}
		}else{
			setFlashMessage('error','gagal verifikasi, kemungkinan token tidak valid atau sudah expired, untuk melakukan verifikasi ulang silahkan klik link ini '.anchor('user/verifications/request', 'resend verifications', ['class' => 'btn btn-sm btn-info']).'','danger');
			redirect('user/login');
		}
	}

	public function resendUserVerification()
	{
		$data = [
			'title' => 'resend verifikasi',
			'notification' => getFlashMessage()
		];

		$this->load->view('layouts/admin/header', $data);
		$this->load->view('pages/auth/resend_verification', $data);
		$this->load->view('layouts/admin/scripts');
	}

	public function resendFormVerificationVerify()
	{
		$_FORM = $this->form_validation;
		$_FORM->set_rules('email_resend','Email Resend','required',['required' => '%s harus di isi']);
		$_FORM->set_error_delimiters('<div class="alert alert-warning">','</div>');
		if($_FORM->run() == FALSE) {
			$this->resenduserverification();
		} else {
			$email = $this->input->post('email_resend');
			$email_exists = $this->auth->checkauth($email);
			if($email_exists) {
				foreach($email_exists as $user_account);
				$check_verifications = $this->users->getById('users', ['email' => $email])->row();
				if($check_verifications->status_account != 'verified') {
					$check_email_exists_in_token = $this->users->getById('user_verifications', ['email' => $email]);
					if ($check_email_exists_in_token) {
					    $randomNumber = $this->token_generator->crypto_rand_secure(50, 100);
					    $token = $this->token_generator->getToken($randomNumber);
					    $expired_time_token = date('Y:m:d H:i', strtotime('+1 hour'));
					    $this->users->update('user_verifications', ['token' => $token, 'expired_time' => $expired_time_token], ['email' => $email]);

					    $fullname = $user_account->nama_depan . ' ' . $user_account->nama_belakang;
					    $email_data = [
					        'fullname' => $fullname,
					        'title' => 'Selamat Datang',
					        'token' => $token
					    ];

					    $messsage_config = [
					        'htmlContent' => $this->load->view('pages/email/user_verifications', $email_data, true),
					        'recipients' => $email,
					        'subject' => 'Verifikasi Akun',
					        'message' => setFlashMessage('success', 'email verifikasi sudah terkirim silahkan check email anda ' . $email . ' untuk verifikasi akun anda', 'success'),
					    ];

					    sendEmail($messsage_config, 'user/login');
					} else {
					    $randomNumber = $this->token_generator->crypto_rand_secure(50, 100);
					    $token = $this->token_generator->getToken($randomNumber);
					    $data_user_verification = [
					        'email' => $email,
					        'token' => $token,
					        'created_time' => date('Y:m:d H:i'),
					        'expired_time' => date('Y:m:d H:i', strtotime('+1 hour'))
					    ];
					    $this->users->create('user_verifications', $data_user_verification);

					    $fullname = $user_account->nama_depan . ' ' . $user_account->nama_belakang;
					    $email_data = [
					        'fullname' => $fullname,
					        'title' => 'Selamat Datang',
					        'token' => $token
					    ];

					    $messsage_config = [
					        'htmlContent' => $this->load->view('pages/email/user_verifications', $email_data, true),
					        'recipients' => $email,
					        'subject' => 'Verifikasi Akun',
					        'message' => setFlashMessage('success', 'email verifikasi sudah terkirim silahkan check email anda ' . $recipients . ' untuk verifikasi akun anda', 'success'),
					    ];

					    sendEmail($messsage_config, 'user/login');
					}
				}else{
					setFlashMessage('error','email sudah diverifikasi','warning');
					redirect('user/login');	
				}
			} else {
				setFlashMessage('error','email tidak ditemukan','warning');
				$this->resenduserverification();
			}
		}
	}

}

/* End of file User_verification.php */
/* Location: ./application/controllers/auth/User_verification.php */