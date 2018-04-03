<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compare_unit extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {
		$data = array(
			'header_white' => "header-white",
			'userdata'	=> $this->userdata,
			'title' => 'Produk Komparasi',
			'form_auth_mobile' => login_status_form_mobile($this->userdata),
			'form_auth'	=> login_Status_form($this->userdata)
		);
		$view = "find/compare_unit";
		template($view, $data);
	}

}

/* End of file Compare_unit.php */
/* Location: ./application/controllers/find/Compare_unit.php */