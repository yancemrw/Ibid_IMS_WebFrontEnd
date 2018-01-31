<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comingsoon extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
	}

	public function index() {
		$userdata = $this->session->userdata('userdata');
		$data = array(
			'header_white'		=> "header-white",
			'userdata'			=> $userdata,
			'title'				=> 'Coming Soon',
			'form_auth'			=> login_Status_form($userdata),
			'form_auth_mobile'	=> login_status_form_mobile($userdata)
		);
		template('errors/comingsoon', $data);
	}

}

/* End of file Comingsoon.php */
/* Location: ./application/controllers/Comingsoon.php */