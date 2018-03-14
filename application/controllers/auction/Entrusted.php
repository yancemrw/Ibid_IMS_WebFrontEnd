<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrusted extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global', 'omni'));
		$this->AccessApi = new AccessApi(array('client_id' => 'ADMS Web', 'client_secret' => '1234567890', 'username' => 'rendhy.wijayanto@sera.astra.co.id'));
		$this->AccessApi->redirect_url = site_url('login');
		$this->AccessApi->check_login();
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index($not_comming = '') {
		$data = array(
			'header_white'	=> "header-white",
			'userdata'		=> $this->userdata,
			'title'			=> 'Titip Lelang',
			'form_auth_mobile' => login_status_form_mobile($this->userdata),
			'form_auth'		=> login_Status_form($this->userdata)
		);

		## get detail users
		$id = trim(@$this->session->userdata('userdata')['UserId']);
		$url = linkservice('account') ."users/details/".$id;
		$method = 'GET';
		$responseApi = admsCurl($url, array('tipePengambilan' => 'dropdownlist'), $method);
		if($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } 
		else { $dataApiDetail = json_decode($responseApi['response'], true); }
		$detailBiodata = @$dataApiDetail['data']['users'];

		/* *******************************
			cek kelengkapan data awal
			********************************
		*/
		if ($detailBiodata['Phone'] !== NULL &&
			$detailBiodata['BankId'] !== NULL && 
			$detailBiodata['BankAccountNumber'] !== NULL && 
			$detailBiodata['BankAccountName'] !== NULL && 
			$detailBiodata['IdentityNumber'] !== NULL
		) {
			// redirect('pembelian');
			
			$data['title']	= 'Titip Lelang';
			$data['page'] 	= 'auction/entrusted_booking';
			$data['detailBiodata'] = $detailBiodata;
			
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
			$view = 'auction/entrusted_booking';
			template($view, $data);
			
		}
		else {
			$data['title']	= 'Pembelian NPL';
			$data['page'] 	= 'pembelian/add';
			$data['detailBiodata'] = $detailBiodata;
			
			############################################################
			## get list Item Type
			$url = linkservice('master')."item/get";  
			$method = 'GET';
			$responseApi1 = admsCurl($url, array('tipePengambilan' => 'dropdownlist'), $method);
			if ($responseApi1['err']) { 
				echo "<hr>cURL Error #:" . $responseApi1['err']; 
			}
			else {
				$dataApi = json_decode($responseApi['response'],true);
				$itemType = $dataApi['data'];
			}
			$data['itemType'] = @$itemType;
			############################################################

			############################################################
			$url2 = linkservice('master')."bank/get";
			$method2 = 'GET';
			$responseApi2 = admsCurl($url2, array('tipePengambilan' => 'dropdownlist'), $method2);
			$listBank = curlGenerate($responseApi2);
			$data['listBank'] = @$listBank;
			############################################################
			
			############################################################
			## get cabang
			$url3 = linkservice('master')."cabang/get";  
			$method3 = 'GET';
			$responseApi3 = admsCurl($url3, array('tipePengambilan' => 'dropdownlist'), $method3);
			if ($responseApi3['err']) { 
				echo "<hr>cURL Error #:" . $responseApi3['err']; 
			}
			else {
				$dataApi = json_decode($responseApi3['response'],true);
				$itemType = $dataApi['data'];
			}
			$data['cabang'] = @$itemType;
			############################################################
			$view = "auction/entrusted";
			template($view, $data);
		}
	}

}

/* End of file Entrusted.php */
/* Location: ./application/controllers/auction/Entrusted.php */