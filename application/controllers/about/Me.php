<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Me extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {
		// get content from cms
		$url = linkservice('cms')."api/siapakami";
		$method = 'GET';
		$res = admsCurl($url, array(), $method);
		$whome = curlGenerate($res);

		$data = array(
			'menu_pages'		=> 'about',
			'menu_title'		=> 'Tentang IBID',
			'userdata'			=> $this->userdata,
			'title'				=> 'Tentang IBID',
			'form_auth_mobile'	=> login_status_form_mobile($this->userdata),
			'form_auth'			=> login_Status_form($this->userdata),
			'content'			=> $whome
		);
		$view = "about/me";
		template($view, $data);
	}

}

/* End of file Me.php */
/* Location: ./application/controllers/about/Me.php */