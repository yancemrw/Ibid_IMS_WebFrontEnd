<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller { 

	function __construct() {
        parent::__construct();
        if (!@$_SESSION['idfront']){ redirect(base_url()); }
        $this->load->helper(array('global' , 'omni'));
    }
	
	function index() {
		// print_r($this->session->all_userdata());
		// exit();
		$this->load->library('cart');
		$userdata = $this->session->userdata('userdata');
		$data['message'] = $this->session->flashdata('message');

		############################################################
		$id = trim($_SESSION['idfront']);
		## get detail users
		$url = linkservice('account') ."users/details/".$id;
		$method = 'GET';
		$responseApi = admsCurl($url, array('tipePengambilan'=>'dropdownlist'), $method);
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else {
			$dataApiDetail = json_decode($responseApi['response'],true);
		}
		$detailBiodata = @$dataApiDetail['data']['users'];  

		/* *******************************
			cek kelengkapan data awal
			********************************
		*/
		if ($detailBiodata['Phone'] == '' ||
			$detailBiodata['BankId'] == '' || 
			$detailBiodata['BankAccountNumber'] == '' || 
			$detailBiodata['BankAccountName'] == '' 
		){
			
			$data['page'] 	= 'biodata/ForNPL';
			$data['detailBiodata'] = $detailBiodata;
			############################################################
			## get list Bank
			$url = linkservice('master')."bank/get";
			$method = 'GET';
			$responseApi = admsCurl($url, array('tipePengambilan'=>'dropdownlist'), $method);
			if ($responseApi['err']) { 
				echo "<hr>cURL Error #:" . $responseApi['err']; 
			} else {
				$dataApi = json_decode($responseApi['response'],true);
				$listBank = $dataApi['data'];
			}
			$data['listBank'] = @$listBank;
			############################################################
			
			redirect();
		} 
		else {
			$data['title']	= 'Pembelian NPL';
			// $view 			= 'pembelian/add';

			$view 			= 'npl/pemesanan_view';
			
			############################################################
			## get list Item Type
			$url = linkservice('master')."item/get";  
			$method = 'GET';
			$responseApi = admsCurl($url, array('tipePengambilan'=>'dropdownlist'), $method);
			if ($responseApi['err']) { 
				echo "<hr>cURL Error #:" . $responseApi['err']; 
			} else {
				$dataApi = json_decode($responseApi['response'],true);
				$itemType = $dataApi['data'];
			}
			$data['itemType'] = @$itemType;
			############################################################
			
			############################################################
			## get cabang
			$url = linkservice('master')."cabang/get";  
			$method = 'GET';
			$responseApi = admsCurl($url, array('tipePengambilan'=>'dropdownlist'), $method);
			if ($responseApi['err']) { 
				echo "<hr>cURL Error #:" . $responseApi['err']; 
			} else {
				$dataApi = json_decode($responseApi['response'],true);
				$itemType = $dataApi['data'];
			}
			$data['cabang'] = @$itemType;
			############################################################
			
		}
		
		$data['header_white']	= "header-white";
		$data['userdata']		= $userdata;
		$data['form_auth']		= login_Status_form($userdata);

		template($view, $data);
	}

	public function beli() {
		$userdata 					= $this->session->userdata('userdata');
		$data['form_auth_mobile'] 	= login_status_form_mobile($userdata);
		$view 						= 'npl/pemesanan_view_base';
		$data['header_white']		= "header-white";
		$data['userdata']			= $userdata;
		$data['form_auth']			= login_Status_form($userdata);

		template($view, $data);
	}

}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
