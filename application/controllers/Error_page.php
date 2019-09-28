<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_page extends CI_Controller {
	protected
	$app = 'layouts/guest/base';
	public function index()
	{
		$data = [
			'title' => 'Error Page',
			'class_body' => 'error-page',
			'content' => 'error_page/my_custom_error'
		];
		return $this->load->view($this->app, $data);
	}

}

/* End of file Error_page.php */
/* Location: ./application/controllers/Error_page.php */