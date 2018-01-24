<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {
		$data = array(
			'header_white' => "header-white",
			'userdata'	=> $this->userdata,
			'title' => 'Halaman Lelang',
			'form_auth_mobile' => login_status_form_mobile($this->userdata),
			'form_auth'	=> login_Status_form($this->userdata),
			'img1' => base_url().'assetsfront/images/background/img-recommend-1.jpg',
			'img2' => base_url().'assetsfront/images/background/img-recommend-2.jpg',
			'img3' => base_url().'assetsfront/images/background/img-recommend-3.jpg',
		);
		$view = "auction/details";
		template($view, $data);
	}

}

/* End of file detail.php */
/* Location: ./application/controllers/auction/detail.php */