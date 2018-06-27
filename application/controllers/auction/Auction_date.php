<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auction_date extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {
		$data = array(
			'header_white' => "header-white",
			'userdata'	=> $this->userdata,
			'title' => 'Jadwal Lelang',
			'form_auth_mobile' => login_status_form_mobile($this->userdata),
			'form_auth'	=> login_Status_form($this->userdata)
		);
		
		############################################################
		## get cabang
		$url = linkservice('master')."cabang/get";  
		$method = 'GET';
		$responseApi = admsCurl($url, array('tipePengambilan'=>'dropdownlist'), $method);
		if ($responseApi['err']) { 
		    echo "<hr>cURL Error #:" . $responseApi['err']; 
		} else {
		    $dataApi = json_decode($responseApi['response'],true);
		    $cabang = $dataApi['data'];
		}
		$data['cabang'] = @$cabang;
		############################################################

        	// get data from front
		/*if(@$this->input->post()) {
			$data['parsing_post'] = json_encode($this->input->post());
		}*/
		
		$view = "auction/auction_date";
		template($view, $data);
	}

	public function iscomming() {
		$data = array(
			'header_white' => "header-white",
			'userdata'	=> $this->userdata,
			'title' => 'Jadwal Lelang',
			'form_auth_mobile' => login_status_form_mobile($this->userdata),
			'form_auth'	=> login_Status_form($this->userdata)
		);
		$view = "auction/auction_date_iscomming";
		template($view, $data);
	}

}

/* End of file auction_date.php */
/* Location: ./application/controllers/auction/auction_date.php */
