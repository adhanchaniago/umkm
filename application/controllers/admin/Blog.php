<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	protected
	$app   = 'layouts/admin/base',
	$table = [
		'blog'      => 'blog',
		'data_umkm' => 'data_umkm',
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
		$this->load->model('blog_model','blog');
	}

	public function index()
	{
		$user_data   = $this->session->userdata('user');
		$umkm        = $this->data->getById($this->table['data_umkm'], ['user_email' => $user_data['email']]);
		$umkm_id     = !empty($umkm->row()->id) ? $umkm->row()->id : false;
		$umkm_status = !empty($umkm->row()->status) ? $umkm->row()->status : false;
		
		if($user_data['level'] == 'admin') {
			$data = [
				'title'        => 'Blog UMKM',
				'content'      => 'admin/blog/blog',
				'blogs'        => $this->blog->getDataAdminBlog(intval($umkm_id)),
				'umkm_status'  => $umkm_status,
				'notification' => getFlashMessage()
			];
			$this->load->view($this->app, $data);	
		} else {
			setFlashMessage('error','maaf mungkin anda tidak mempunyai hak akses pada halaman yang anda minta','warning');
			redirect('/');
		}
		
		
	}

	public function create()
	{
		$user_data = $this->session->userdata('user');
		$umkm = $this->data->getById($this->table['data_umkm'], ['user_email' => $user_data['email']]);
		$umkm_status = $umkm->row()->status;
		if($umkm->num_rows() == 1 && $user_data['level'] == 'admin' && $umkm_status == 'approved') {
			$data = [
				'title'   => 'Create Blog UMKM',
				'content' => 'admin/blog/create'
			];

			$this->load->view($this->app, $data);
		} else {
			setFlashMessage('error','halaman tidak ditemukan','warning');
			redirect('/adminumkm/blog');
		}
	}

	public function store()
	{
		$user_data = $this->session->userdata('user');
		$umkm = $this->data->getById($this->table['data_umkm'], ['user_email' => $user_data['email']]);
		if($umkm->num_rows() == 1 && $user_data['level'] == 'admin') {
			$_FORM = $this->form_validation;
			$_FORM->set_rules('blog_title','Judul Blog','required');
			$_FORM->set_rules('blog_content','Kontent Blog','required|min_length[1000]','min_length','%s harus minimal 1000 karakter');
			$_FORM->set_message('required','%s harus di isi');
			$_FORM->set_error_delimiters('<small  class="form-text text-danger">','</small>');

			if($_FORM->run() === FALSE) {
				$this->create();
			} else {
				$config = [
				'upload_path'   => './uploads/blog/',
				'allowed_types' => 'jpg|jpeg|png',
				'encrypt_name'  => TRUE
				];
		        // load library upload
		        $this->load->library('upload', $config);
		        $this->upload->do_upload('blog_tumbnail');

				$upload_data   = $this->upload->data();
		      	$blog_tumbnail = $upload_data['file_name'];

				$data = [
					'title'      => strtolower(ucfirst($this->input->post('blog_title'))),
					'slug'       => url_title(strtolower(ucfirst($this->input->post('blog_title')))),
					'tumbnail'   => $blog_tumbnail,
					'content'    => $this->input->post('blog_content'),
					'id_umkm'    => $umkm->row()->id,
					'user_email' => $user_data['email']
				];

				$this->data->store($this->table['blog'], $data);
				setFlashMessage('success','anda berhasil membuat blog','success');
				redirect('adminumkm/blog');
			}
		} else {
			setFlashMessage('error','maaf mungkin anda tidak mempunyai hak akses pada halaman yang anda minta','warning');
			redirect('adminumkm/blog');
		}
	}

	public function edit()
	{
		$user_data    = $this->session->userdata('user');
		$id = $this->uri->segment(3);
		$umkm         = $this->data->getById($this->table['data_umkm'], ['user_email' => $user_data['email']]);
		$blog         = $this->data->getById($this->table['blog'], ['id' => $id]);
		$id_umkm      = $umkm->row()->id;
		$id_umkm_blog = $blog->row()->id_umkm;
		if($umkm->num_rows() == 1 && $blog->num_rows() == 1 && $user_data['level'] == 'admin' && $id_umkm_blog == $id_umkm) {
			$data = [
				'title'   => 'Edit Blog UMKM',
				'content' => 'admin/blog/edit',
				'blog'    => $blog->row()
			];

			$this->load->view($this->app, $data);
		} else {
			setFlashMessage('error','anda mungkin belum mendaftarkan umkm anda atau anda tidak memiliki access pada halaman yang anda minta','warning');
			redirect('/adminumkm/blog');
		}
	}

	public function update()
	{
		$user_data = $this->session->userdata('user');
		$umkm      = $this->data->getById($this->table['data_umkm'], ['user_email' => $user_data['email']]);
		$id        = $this->uri->segment(3);
		$blog      = $this->data->getById($this->table['blog'], ['id' => $id])->row();
		if($umkm->num_rows() == 1 && $user_data['level'] == 'admin') {
			$_FORM = $this->form_validation;
			$_FORM->set_rules('blog_title','Judul Blog','required');
			$_FORM->set_rules('blog_content','Kontent Blog','required|min_length[1000]','min_length','%s harus minimal 1000 karakter');
			$_FORM->set_message('required','%s harus di isi');
			$_FORM->set_error_delimiters('<small  class="form-text text-danger">','</small>');

			if($_FORM->run() === FALSE) {
				$this->create();
			} else {
				$config = [
				'upload_path'   => './uploads/blog/',
				'allowed_types' => 'jpg|jpeg|png',
				'encrypt_name'  => TRUE
				];
		        // load library upload
		        $this->load->library('upload', $config);
		        $file_upload = $this->upload->do_upload('blog_tumbnail');
		        if($file_upload != null) {
		        	unlink(FCPATH.'./uploads/blog/'.$blog->tumbnail);
					$upload_data   = $this->upload->data();
			      	$blog_tumbnail = $upload_data['file_name'];
		        } else {
			      	$blog_tumbnail = $this->input->post('old_blog_tumbnail');
			      }


				$data = [
					'title'      => strtolower(ucfirst($this->input->post('blog_title'))),
					'slug'       => url_title(strtolower(ucfirst($this->input->post('blog_title')))),
					'tumbnail'   => $blog_tumbnail,
					'content'    => $this->input->post('blog_content'),
				];

				$this->data->update($this->table['blog'], $data, ['id' => $id]);
				setFlashMessage('success','update blog berhasil','success');
				redirect('adminumkm/blog');
			}
		} else {
			setFlashMessage('error','maaf mungkin anda tidak mempunyai hak akses pada halaman yang anda minta','warning');
			redirect('adminumkm/blog');
		}
	}

	public function delete()
	{
		$user_data    = $this->session->userdata('user');
		$umkm = $this->data->getById($this->table['data_umkm'], ['user_email' => $user_data['email']]);
		$umkm_id = !empty($umkm->row()->id) ? $umkm->row()->id : false;
		$id           = $this->uri->segment(3);
		$blog         = $this->data->getById($this->table['blog'], ['id' => $id]);
		$blog_umkm_id = $blog->row()->id_umkm;

		if($blog->num_rows() == 1 && $user_data['level'] == 'admin' && $blog_umkm_id == $umkm_id) {
			unlink(FCPATH.'./uploads/blog/'.$blog->row()->tumbnail);
			$this->data->destroy($this->table['blog'],['id' => $id]);
			setFlashMessage('success','blog berhasil di hapus','success');
			redirect('adminumkm/blog');
		} else {
			setFlashMessage('error','maaf mungkin anda tidak mempunyai hak akses pada halaman yang anda minta','warning');
			redirect('adminumkm/blog');	
		}
	}
}

/* End of file Blog.php */
/* Location: ./application/controllers/admin/Blog.php */