<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller { 

	function __construct() {
        parent::__construct();
        // if (!@$_SESSION['idfront']){ redirect(base_url()); }
        $this->load->helper(array('global' , 'omni'));
    }
	
	function index() {
		// print_r($this->session->all_userdata());
		// exit();
		$this->load->library('cart');
		$userdata = $this->session->userdata('userdata');
		$data['message'] = $this->session->flashdata('message');

		############################################################
		$id = trim($_SESSION['userdata']['UserId']);
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
		if (!is_null($detailBiodata['Phone']) &&
			!is_null($detailBiodata['BankId']) &&
			!is_null($detailBiodata['BankAccountNumber']) && 
			!is_null($detailBiodata['BankAccountName']) &&
			!is_null($detailBiodata['IdentityNumber'])
 		) {			
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
			$data['title']				= 'Pembelian NPL';
			$data['header_white']		= "header-white";
			$data['userdata']			= $userdata;
			$data['form_auth_mobile']	= login_status_form_mobile($userdata);
			$data['form_auth']			= login_Status_form($userdata);
			$view 						= 'npl/pemesanan_view';
			template($view, $data);			
		} 
		else {
			// disini ada pengecekan untuk no otp jika sudah di input atau belum
			// #################################################################
			redirect('beli-npl');
		}
	}

	public function beli() {
		$userdata 					= $this->session->userdata('userdata');
		$data['form_auth_mobile'] 	= login_status_form_mobile($userdata);
		$view 						= 'npl/pemesanan_view_base';
		$data['header_white']		= "header-white";
		$data['userdata']			= $userdata;
		$data['form_auth_mobile']	= login_status_form_mobile($userdata);
		$data['form_auth']			= login_Status_form($userdata);

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
		
		template($view, $data);
	}

}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
