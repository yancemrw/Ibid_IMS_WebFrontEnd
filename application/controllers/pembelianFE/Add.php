<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller { 

	function index(){
		$data['title']	= 'Counter | Tambah Pembelian NPL';
		$data['page'] 	= 'counter/pembelian/add';

		$data['message'] = $this->session->flashdata('message');

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
		$this->load->library('cart');
		
		$this->load->view('templateadmin',$data);
	}

}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
