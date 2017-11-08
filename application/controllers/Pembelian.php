<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller { 

	function __construct() {
        parent::__construct();
        if (!@$_SESSION['idfront']){ redirect(base_url()); }
    }
	
	function index(){
		$this->load->library('cart');
		
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
			$detailBiodata['BankAccountName'] == '' || 
			
			$detailBiodata['Name'] == '' || 
			$detailBiodata['IdentityNumber'] == '' || 
			$detailBiodata['NpwpNumber'] == '' 
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
			
			
		} 
		else {
			$data['title']	= 'Pembelian NPL';
			$data['page'] 	= 'pembelian/add';
			
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
			
		}
		
		
		
		
			// echo '<pre>';
			// echo $detailBiodata['Phone'].'<hr>';
			// echo $detailBiodata['BankId'].'<hr>';
			// echo $detailBiodata['BankAccountNumber'].'<hr>';
			// echo $detailBiodata['BankAccountName'].'<hr>';
			
			// echo $detailBiodata['Name'].'<hr>';
			// echo $detailBiodata['IdentityNumber'].'<hr>';
			// echo $detailBiodata['NpwpNumber'].'<hr>';
			
			// print_r($data['detailBiodata']);
			// echo '</pre>';
		
		$this->load->view('templateAdminLTE',$data);
	}

}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
