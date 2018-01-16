<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find_unit extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
	}

	public function index() {
		$userdata = $this->session->userdata('userdata');
		$data = array(
			'header_white' => "header-white",
			'userdata'	=> $userdata,
			'title' => 'Cari Kendaraan',
			'form_auth'	=> login_Status_form($userdata),
			'img' => base_url('assetsfront/images/background/img-recommend-1.jpg'),
			'link_detail' => base_url('index.php/detail-lelang')
		);
		$view = "find/find_unit";
		template($view, $data);
	}

}

/* End of file find_unit.php */
/* Location: ./application/controllers/find/find_unit.php */