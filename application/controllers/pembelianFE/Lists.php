<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller { 

	function index(){
		$data['title']	= 'Counter Pembelian NPL';
		$data['page'] 	= 'counter/pembelian/lists';

		$data['message'] = $this->session->flashdata('message');

		// Hakakses  
		$data['add']	 = anchor('counter/pembelian/add/', '<i class="fa fa-plus"></i> Tambah' , 'class="btn pull-right btn-purple ttipDatatables"  data-provide="tooltip" data-placement="top" title="Menambahkan Data" data-original-title="Menambahkan Data"');
		
		// $data['detail']  = site_url('counter/pembelian/detail'); 
		// $data['update']  = site_url('counter/pembelian/update'); 
		// $data['delete']	 = site_url('item/delete'); 

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

		$this->load->view('templateadmin',$data);
	}

}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
