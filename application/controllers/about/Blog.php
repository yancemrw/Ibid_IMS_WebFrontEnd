<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {
		$url = linkservice('cms')."api/home";
		$method = 'GET';
		$res = admsCurl($url, array(), $method);
		$generate = curlGenerate($res);

		$data = array(
			'header_white'		=> "header-white",
			'userdata'			=> $this->userdata,
			'title'				=> 'Tentang IBID',
			'form_auth_mobile'	=> login_status_form_mobile($userdata),
			'form_auth'			=> login_Status_form($userdata),
			'content'			=> $generate
		);
		$view = "about/blog";
		template($view, $data);
	}

}

/* End of file Blog.php */
/* Location: ./application/controllers/about/Blog.php */