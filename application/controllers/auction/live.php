<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Live extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('global' , 'omni'));
	}

	public function index() {
		$data = array(
			'header_white' => "header-white",
			'userdata'	=> $this->session->userdata('userdata'),
			'title' => 'Lelang Langsung'
		);
		$view = "auction/live";
		template($view, $data);
	}

}

/* End of file live.php */
/* Location: ./application/controllers/auction/live.php */