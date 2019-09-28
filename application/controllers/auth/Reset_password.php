<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller {
private 
$table_reset = 'reset_passwords';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model','auth');
		$this->load->model('auth_model','check_auth'); //load model auth_model aliases by check_auth
		$this->load->library('hashing'); //load hashing library for hash string and re-hash string
		$this->load->library('token_generator'); //load token_generator for create random token
	}

	public function forgetPassword()
	{
		if($this->input->get()) {
			$token = $this->input->get('token');
			$check_token = $this->auth->getById($this->table_reset, ['token' => $token])->row();
			if($check_token) {
				$data = [
					'title' => 'ubah password',
					'notification' => getFlashMessage(),
					'email' => $check_token->email,
					'token' => $check_token->token,
				];
				$this->load->view('layouts/admin/header', $data);
				$this->load->view('pages/auth/reset_password', $data);
				$this->load->view('layouts/admin/scripts');	
			} else {
				setFlashMessage('error','maaf token yang anda masukkan salah / tidak valid','warning');
				redirect('user/login');
			}
		} else {
			$data = [
				'title' => 'lupa password',
				'notification' => getFlashMessage(),
			];
			$this->load->view('layouts/admin/header', $data);
			$this->load->view('pages/auth/forget_password', $data);
			$this->load->view('layouts/admin/scripts');
		}
	}

	public function sendResetPassword()
	{
		$_FORM = $this->form_validation;
		$_FORM->set_rules('reset_password','Password Baru','required|min_length[8]');
		$_FORM->set_rules('reset_password_confirmation','Konfirmasi Password Baru','required|min_length[8]|matches[reset_password]');
		$_FORM->set_message([
			'required' => '%s harus di isi',
			'min_length' => '%s minimal harus 8 karakter',
			'matches' => '%s tidak sama',
		]);
		$_FORM->set_error_delimiters('<div class="alert alert-warning">','</div>');
		if($_FORM->run() === FALSE) {
			setFlashMessage('error',validation_errors(),'warning');
			redirect('user/forget-password?&token='.$this->input->post('token'));
		} else {
			$new_password = [
				'password' => $this->hashing->hash_string($this->input->post('reset_password')),
				'email'    => strtolower($this->input->post('email'))
			];
			$this->auth->update('users',['password' => $new_password['password']],['email' => $new_password['email']]);
			$this->auth->destroy($this->table_reset,['email' => $new_password['email']]);
			setFlashMessage('success','password berhasil di reset silahkan melakukan login','success');
			redirect('user/login');
		}
	}

	public function sendForgetPassword()
	{
		$this->form_validation->set_rules('email_forget_password','Email Verifikasi','trim|required|valid_email|valid_emails',
			[
				'required' => '%s harus di isi'
			]
		);
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">','</div>');
		if($this->form_validation->run() === FALSE){
			return $this->forgetPassword();
		}else{
			$email = strtolower($this->input->post('email_forget_password'));
			$check_email_exists = $this->check_auth->checkAuth($email);
			if($check_email_exists){
				foreach($check_email_exists as $user_account);
					$check_email_in_reset_password = $this->auth->getById($this->table_reset,['email' => $email])->row();
					if(!$check_email_in_reset_password){
						$randomNumber = $this->token_generator->crypto_rand_secure(50,100);
						$token        = $this->token_generator->getToken($randomNumber);
						$data_reset_password = [
							'email' => $email,
							'token' => $token,
							'created_time' => date('Y:m:d H:i'),
							'expired_time' => date('Y:m:d H:i', strtotime('+1 hour'))
						];
						$this->auth->store($this->table_reset,$data_reset_password);
						$fullname  = $user_account->nama_depan.' '.$user_account->nama_belakang;
			            $email_data = [
			            	'fullname' => $fullname,
			            	'title'     => 'Hey',
			            	'token'     => $token
			            ];
			            $message_config = [
			            	'htmlContent' => $this->load->view('pages/email/user_reset_password',$email_data, TRUE),
			            	'recipients'  => $email,
			            	'subject'     => 'Petunjuk Reset Password',
			            	'message'     => setFlashMessage('success','email verifikasi reset password sudah terkirim silahkan check email anda '.$email.' untuk mereset password anda','success')
			            ];
			            sendEmail($message_config,'user/login');
					}else{
						$randomNumber = $this->token_generator->crypto_rand_secure(50, 100);
					    $token = $this->token_generator->getToken($randomNumber);
					    $expired_time_token = date('Y:m:d H:i', strtotime('+1 hour'));
					    $this->auth->update('reset_passwords', ['token' => $token, 'expired_time' => $expired_time_token], ['email' => $email]);

						$fullname  = $user_account->nama_depan.' '.$user_account->nama_belakang;
			            $email_data = [
			            	'fullname' => $fullname,
			            	'title'     => 'Hey',
			            	'token'     => $token
			            ];
			            $message_config = [
			            	'htmlContent' => $this->load->view('pages/email/user_reset_password',$email_data, TRUE),
			            	'recipients'  => $email,
			            	'subject'     => 'Petunjuk Reset Password',
			            	'message'     => setFlashMessage('success','email verifikasi reset password sudah terkirim silahkan check email anda '.$email.' untuk mereset password anda','success')
			            ];
			            sendEmail($message_config,'user/login');
					}
			}else{
				setFlashMessage('error','email anda tidak terdaftar didalam sistem kami','danger');
				redirect('user/forget-password');
			}
		}
	}

}

/* End of file Reset_password.php */
/* Location: ./application/controllers/auth/Reset_password.php */