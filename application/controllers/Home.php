<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	protected 
	$app = 'layouts/guest/base',
	$table = 'products';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model','product');
	}
	public function index()
	{
		$data = [
			'title'        => 'Home',
			'content'      => 'guest/home',
			'notification' => getFlashMessage(),
			'data_batik'     => $this->product->guestProductInterest($this->table, ['id_category' => 1], 'created_at desc')->result(),
			'data_sepatu'    => $this->product->guestProductInterest($this->table, ['id_category' => 2], 'created_at desc')->result(),
			'data_oleh_oleh' => $this->product->guestProductInterest($this->table, ['id_category' => 4], 'created_at desc')->result(),
		];
		$this->load->view($this->app, $data);
	}
}
