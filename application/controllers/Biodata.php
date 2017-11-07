<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller { 

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
			$data['page'] 	= 'counter/pembelian/add';
		}
		
		
		
		
			// echo '<pre>';
			// print_r($data['detailBiodata']);
			// echo '</pre>';
		
		$this->load->view('templateAdminLTE',$data);
	}

	function updateForNPL(){
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
		
		// update users
		$dataPost['dataUpdate'] = array(
			'Name' => $_POST['Name'],
			'Phone' => $_POST['Phone'],
		);
		$dataPost['whereUpdate'] = array(
			'UserId' => $id,
		);
		$url = linkservice('account') ."users/updates";
		$method = 'POST';
		$responseApi = admsCurl($url, $dataPost, $method);
		
		/* ******************************** 
			users biodata
		*/
		$usersBiodataArray = array(
			'BiodataId' => $id,
			'IdentityNumber' => $_POST['IdentityNumber'],
			'NpwpNumber' => $_POST['NpwpNumber'],
			'BankId' => $_POST['BankId'],
			'BankAccountName' => $_POST['BankAccountName'],
			'BankAccountNumber' => $_POST['BankAccountNumber'],
		);
		if ($detailBiodata['BiodataId'] == ''){
			
			
			// Insert Biodata
			$url = linkservice('account') .'usersbiodata/add';
			$method = 'POST';
			$responseApi = admsCurl($url, $usersBiodataArray, $method);
			if ($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			} else {
			}
			
		}
		else {
			
			// UPDATE Biodata
			$dataPostUsersBiodata['dataUpdate'] = $usersBiodataArray;
			$dataPostUsersBiodata['whereUpdate'] = array('BiodataId' => $id);
			
			$url = linkservice('account') ."usersbiodata/updates";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataPostUsersBiodata, $method);
			if ($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			} else {
			}
		}
		
		redirect('pembelian');
		// echo '<pre>';
		// print_r($_POST);
		// print_r($detailBiodata);
		// echo '</pre>';
	}
}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
