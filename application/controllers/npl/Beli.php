<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beli extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global' , 'omni'));
		$this->AccessApi = new AccessApi(array('client_id' => 'ADMS Web', 'client_secret' => '1234567890', 'username' => 'rendhy.wijayanto@sera.astra.co.id'));
		$this->AccessApi->redirect_url = base_url('auth/loginCustomer');
		$this->AccessApi->check_login();
	}

	public function index()
	{

		$data = array(
			// header white untuk selain home, karena menggunakan header yang berwarna putih
			'header_white' => "header-white",
			'userdata'	=> $this->session->userdata('userdata'),
			'title' => 'Beli Nomor Peserta Lelang ( NPL )'
		);




		### diambil dari frontend lama
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
		
		


		$view = "npl/npl_view";
		template($view , $data);
	}

}

/* End of file Beli.php */
/* Location: ./application/controllers/npl/Beli.php */