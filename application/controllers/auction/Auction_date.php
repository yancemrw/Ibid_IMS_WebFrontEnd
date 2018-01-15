<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auction_date extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
	}

	public function index() {
		$data = array(
			'header_white' => "header-white",
			'userdata'	=> $this->session->userdata('userdata'),
			'title' => 'Jadwal Lelang',
		);
		$view = "auction/auction_date";
		template($view, $data);
	}

}

/* End of file auction_date.php */
/* Location: ./application/controllers/auction/auction_date.php */
