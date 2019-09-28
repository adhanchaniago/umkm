<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$CI =& get_instance();
$data['categories'] = $CI->db->get('product_category')->result();
// load header from layouts
$this->load->view('layouts/guest/header', $data);
	// load page content 
	$this->load->view('pages/'. $content);
// load footer from layout
$this->load->view('layouts/guest/footer');

