<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auction_date extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
	}

	public function index() {
		$userdata = $this->session->userdata('userdata');
		$data = array(
			'header_white' => "header-white",
			'userdata'	=> $userdata,
			'title' => 'Jadwal Lelang',
			'form_auth_mobile' => login_status_form_mobile($userdata),
			'form_auth'	=> login_Status_form($userdata)
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
		
		$view = "auction/auction_date";
		template($view, $data);
	}

}

/* End of file auction_date.php */
/* Location: ./application/controllers/auction/auction_date.php */
