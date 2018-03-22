<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$scheduleURL = 'http://alpha.ibid.astra.co.id/backend/serviceams/auction/api/multicurrentlot';
			// $scheduleURL = 'http://ibid-ams-auction.development.net/api/multicurrentlot'; //user on local 
			$postData = $this->input->post();
			$schedule = admsCurl($scheduleURL, $postData, 'POST');
			$scheduleData = json_decode($schedule['response']);
			$data = array(
				'header_white' => "header-white",
				'userdata'	=> $this->userdata,
				'title' => 'Halaman Lelang',
				'form_auth_mobile' => login_status_form_mobile($this->userdata),
				'form_auth'	=> login_Status_form($this->userdata),
				'auctionsData'	=> $scheduleData->data,
				'img1' => base_url().'assetsfront/images/background/img-recommend-1.jpg',
				'img2' => base_url().'assetsfront/images/background/img-recommend-2.jpg',
				'img3' => base_url().'assetsfront/images/background/img-recommend-3.jpg',
			);
			$view = "auction/details";
			template($view, $data);
		}
		else {
			redirect(site_url('live-auction'), 'refresh');
		}
	}

}

/* End of file detail.php */
/* Location: ./application/controllers/auction/detail.php */