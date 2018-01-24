<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Me extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
	}

	public function index() {
		$userdata = $this->session->userdata('userdata');
		$data = array(
			'menu_pages'		=> 'about',
			'menu_title'		=> 'Tentang IBID',
			'userdata'			=> $userdata,
			'title'				=> 'Tentang IBID',
			'form_auth_mobile'	=> login_status_form_mobile($userdata),
			'form_auth'			=> login_Status_form($userdata)
		);
		$view = "about/me";
		template($view, $data);
	}

}

/* End of file Me.php */
/* Location: ./application/controllers/about/Me.php */