<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrusted_booking extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global', 'omni'));
		$this->AccessApi = new AccessApi(array('client_id' => 'ADMS Web', 'client_secret' => '1234567890', 'username' => 'rendhy.wijayanto@sera.astra.co.id'));
		$this->AccessApi->redirect_url = site_url('login');
		$this->AccessApi->check_login();
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {
		$data = array(
			'header_white'	=> "header-white",
			'userdata'		=> $this->userdata,
			'title'			=> 'Titip Lelang',
			'form_auth_mobile' => login_status_form_mobile($this->userdata),
			'form_auth'		=> login_Status_form($this->userdata)
		);
		
		##################################
		## form dinamis booking taksasi ##
		##################################
		// mobil
		$url = linkservice('stock') ."item/add/getaddbookingtaksasi?id=6"; 
		$method = 'GET'; 
		$responseApi = admsCurl($url, array(), $method); 
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else { 
			$dataApiDetailsMobil = json_decode($responseApi['response'],true); 
		} 
		$data['formDinamisMobil'] = @$dataApiDetailsMobil['formDinamis']; 
		
		// motor
		$url = linkservice('stock') ."item/add/getaddbookingtaksasi?id=7"; 
		$method = 'GET'; 
		$responseApi = admsCurl($url, array(), $method); 
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else { 
			$dataApiDetailsMotor = json_decode($responseApi['response'],true); 
		} 
		$data['formDinamisMotor'] = @$dataApiDetailsMotor['formDinamis']; 
		
		// hve
		$url = linkservice('stock') ."item/add/getaddbookingtaksasi?id=14"; 
		$method = 'GET'; 
		$responseApi = admsCurl($url, array(), $method); 
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else { 
			$dataApiDetailsHve = json_decode($responseApi['response'],true); 
		} 
		$data['formDinamisHve'] = @$dataApiDetailsHve['formDinamis']; 
		######################################
		## END form dinamis booking taksasi ##
		######################################
		
		
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
		
		$view = "auction/entrusted_booking";
		template($view, $data);
	}

}

/* End of file Entrusted_booking.php */
/* Location: ./application/controllers/auction/Entrusted_booking.php */