<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umkm extends CI_Controller {

	protected
	$app = 'layouts\admin\base',
	$table = [
		'data_umkm'     => 'data_umkm',
		'business_type' => 'business_type',
	];

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
		$this->load->model('product_model','product');
	}

	public function index()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}

		$data = [
			'title'        => 'data umkm & produk',
			'content'      => 'admin/umkm/umkm',
			'notification' => getFlashMessage(),
			'umkm'         => $this->umkm->getDataAdminUmkm($user_data['email']),
		];
		if(!empty($data['umkm'])) {
			$data['products'] = $this->product->getDataAdminProduct(intval($data['umkm']->umkm_id));
		} else {
			$data['products'] = null;
		}

		$this->load->view($this->app, $data);
	}

	public function create()
	{
		$user_data = $this->session->userdata('user');
		$umkm = $this->data->getById($this->table['data_umkm'], ['user_email' => $user_data['email']]);
		if( $user_data['level'] != 'admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		} else if($umkm->num_rows() == 1) {
			setFlashMessage('error','anda sudah mendaftarkan umkm anda','warning');
			redirect('/adminumkm/umkm');
		}
		$data = [
			'title'          => 'daftar umkm',
			'content'        => 'admin/umkm/create',
			'business_types' => $this->data->getAllData($this->table['business_type'])->result()
		];

		$this->load->view($this->app, $data);

	}

	public function store()
	{
		$user_data = $this->session->userdata('user');
		if($user_data['level'] != 'admin') {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}

		$_FORM = $this->form_validation;
		$_FORM->set_rules('nama_umkm','Nama UMKM','required');
		$_FORM->set_rules('jenis_usaha','Jenis Usaha','required|callback_businesstyperules');
		$_FORM->set_rules('bentuk_usaha','Bentuk Usaha','required');
		$_FORM->set_rules('visi_umkm','Visi UMKM','required|min_length[50]');
		$_FORM->set_rules('misi_umkm','Misi UMKM','required|min_length[50]');
		$_FORM->set_rules('alamat_umkm','Alamat UMKM','required');
		$_FORM->set_message([
			'required'          => '%s harus di isi',
			'min_length'        => '%s minimal 50 karakter',
			'businesstyperules' => '%s harus dipilih'
		]);
		$_FORM->set_error_delimiters('<small  class="form-text text-danger">','</small>');

		if($_FORM->run() === FALSE) {
			$this->create();
		} else {
			$data = [
				'name'             => $this->input->post('nama_umkm'),
				'address'          => $this->input->post('alamat_umkm'),
				'vision'           => $this->input->post('visi_umkm'),
				'mision'           => $this->input->post('misi_umkm'),
				'id_business_type' => intval($this->input->post('jenis_usaha')),
				'business_form'    => $this->input->post('bentuk_usaha'),
				'user_email'       => $user_data['email'],
			];

			$this->data->store($this->table['data_umkm'], $data);
			setFlashMessage('success','selamat '. $userdata['fullname'] .'anda telah berhasil mendaftarkan umkm anda','success');
			redirect('adminumkm/umkm');

		}

	}

	public function edit()
	{
		$user_data = $this->session->userdata('user');
		$id        = $this->uri->segment(3);
		$umkm      = $this->data->getById($this->table['data_umkm'], ['id' => $id]);
		if($umkm->num_rows() == 1 && $user_data['level'] == 'admin' && $umkm->row()->user_email == $user_data['email']) {
		$data = [
			'title'          => 'edit umkm',
			'content'        => 'admin/umkm/edit',
			'umkm'           => $umkm->row(),
			'business_types' => $this->data->getAllData($this->table['business_type'])->result()
		];

		$this->load->view($this->app, $data);
		} else {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/adminumkm/umkm');
		}

	}

	public function update()
	{
		$user_data = $this->session->userdata('user');
		$id        = $this->uri->segment(3);
		$umkm      = $this->data->getById($this->table['data_umkm'], ['id' => $id]);
		if($umkm->num_rows() == 1 && $user_data['level'] == 'admin' && $umkm->row()->user_email == $user_data['email']) {

				$_FORM = $this->form_validation;
				$_FORM->set_rules('nama_umkm','Nama UMKM','required');
				$_FORM->set_rules('jenis_usaha','Jenis Usaha','required|callback_businesstyperules');
				$_FORM->set_rules('bentuk_usaha','Bentuk Usaha','required');
				$_FORM->set_rules('visi_umkm','Visi UMKM','required|min_length[50]');
				$_FORM->set_rules('misi_umkm','Misi UMKM','required|min_length[50]');
				$_FORM->set_rules('alamat_umkm','Alamat UMKM','required');
				$_FORM->set_message([
					'required'          => '%s harus di isi',
					'min_length'        => '%s minimal 50 karakter',
					'businesstyperules' => '%s harus dipilih'
				]);
				$_FORM->set_error_delimiters('<small  class="form-text text-danger">','</small>');

				if($_FORM->run() === FALSE) {
					$this->edit();
				} else {
					$data = [
						'name'             => $this->input->post('nama_umkm'),
						'address'          => $this->input->post('alamat_umkm'),
						'vision'           => $this->input->post('visi_umkm'),
						'mision'           => $this->input->post('misi_umkm'),
						'id_business_type' => intval($this->input->post('jenis_usaha')),
						'business_form'    => $this->input->post('bentuk_usaha'),
					];

					$this->data->update($this->table['data_umkm'], $data, ['id' => $id]);
					setFlashMessage('success','selamat '. $userdata['fullname'] .'umkm anda berhasil di update','success');
					redirect('adminumkm/umkm');

			}
		} else {
			setFlashMessage('error','terjadi kesalahan mungkin anda tidak punya hak akses pada halaman yang anda minta','warning');
			redirect('/adminumkm/umkm');
		}
	}
	public function businessTypeRules()
	{
		if($this->input->post('jenis_usaha') == '0'){
			return FALSE;
		} else {
			return TRUE;
		}
	}
}

/* End of file Umkm.php */
/* Location: ./application/controllers/admin/Umkm.php */