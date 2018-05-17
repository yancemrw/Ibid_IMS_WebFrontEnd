<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_details extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {

		$data = array(
			'header_white'		=> "header-white",
			'userdata'			=> $this->userdata,
			'title'				=> 'Tentang IBID',
			'form_auth_mobile'	=> login_status_form_mobile($userdata),
			'form_auth'			=> login_Status_form($userdata)
		);
		$view = "about/blog_details";
		template($view, $data);
	}

}

/* End of file Blog_details.php */
/* Location: ./application/controllers/about/Blog_details.php */