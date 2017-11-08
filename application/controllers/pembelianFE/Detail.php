<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller { 

	function index($id){
		$data['title']	= 'Detail Pembelian NPL';
		$data['page'] 	= 'pembelian/detail';

		$data['message'] = $this->session->flashdata('message');
		
		
		// Get transaksi detail
		############################################################
		$transaksiDetailNpl = array();
		$url = linkservice('npl')."counter/transaksidetail/detailNPL/".$id;
		$method = 'GET';
		$responseApi = admsCurl($url, array(), $method);
		if ($responseApi['err']) { 
			echo "<hr>cURL Error #:" . $responseApi['err']; 
		} else {
			$dataApi = json_decode($responseApi['response'],true);
			$transaksiDetailNpl = $dataApi['data'];
		}
		$arrTransactionDetailNPLId = array();
		foreach($transaksiDetailNpl as $row){
			
			// get detail transaksi
			$detailTransaksi = array(
				'TransactionId' => $row['TransactionId'],
				'CodeTransactionNPL' => $row['CodeTransactionNPL'],
				'DateTransactionNPL' => $row['DateTransactionNPL'],
				'TransactionFrom' => $row['TransactionFrom'],
				'BiodataId' => $row['BiodataId'],
				'Total' => $row['Total'],
				'StsPaid' => $row['StsPaid'],
				'StsCanceled' => $row['StsCanceled'],
				'CreateDate' => $row['CreateDate'],
				'CreateUser' => $row['CreateUser'],
				'ModifyDate' => $row['ModifyDate'],
				'ModifyUser' => $row['ModifyUser'],
			);
			// ------------------------------------------------------
			
			
			// get transaksi detail
			$TransactionDetailNPLId = $row['TransactionDetailNPLId'];
			if (!in_array($TransactionDetailNPLId, $arrTransactionDetailNPLId)){
				$arrTransactionDetailNPLId[] = $TransactionDetailNPLId;
				$transaksiDetail[] = array(
					'TransactionDetailNPLId' => $row['TransactionDetailNPLId'],
					'QtyNPL' => $row['QtyNPL'],
					'AmountNPL' => $row['AmountNPL'],
					'ScheduleId' => $row['ScheduleId'],
					'ItemId' => $row['ItemId'],
					'NPLType' => $row['NPLType'],
					'CompanyId' => $row['CompanyId'],
				);
				$arrScheduleId[] = $row['ScheduleId'];
			}
			// ------------------------------------------------------
			
			
			// get NPL
			$npl[] = array(
				'NPLId' => $row['NPLId'],
				'NPLNumber' => $row['NPLNumber'],
				'BiodataId' => $row['BiodataId'],
				'ScheduleId' => $row['ScheduleId'],
				'ItemId' => $row['ItemId'],
				'CompanyId' => $row['CompanyId'],
				'NPLType' => $row['NPLType'],
				'Active' => $row['Active'],
				'IsUsed' => $row['IsUsed'],
				'StartDateNPL' => $row['StartDateNPL'],
				'EndDateNPL' => $row['EndDateNPL'],
				'IsActive' => $row['IsActive'],
			);
			// ------------------------------------------------------
			
		}
		############################################################
		
		$data['detailTransaksi'] = @$detailTransaksi;
		$data['transaksiDetail'] = @$transaksiDetail;
		$data['npl'] = @$npl;
		
		
		
		
		
		############################################################
		// Get detail schedule | $arrScheduleId = array();
		$listJadwal = array();
		$url = linkservice('master')."schedule/GetArray";
		$method = 'POST';
		$responseApi = admsCurl($url, $arrScheduleId, $method);
		if ($responseApi['err']) { 
			echo "<hr>cURL Error #:" . $responseApi['err']; 
		} else {
			$dataApi = json_decode($responseApi['response'],true);
			$listJadwal = $dataApi['data'];
		}
		
		foreach($listJadwal as $row)
			$schedule[$row['ScheduleId']] = $row;
		############################################################
		$data['schedule'] = @$schedule;
		
		
		
		
		############################################################
		## biodata
		$url = linkservice('account')."users/details/".$detailTransaksi['BiodataId'];
		$method = 'GET';
		$responseApi = admsCurl($url, $arrScheduleId, $method);
		if ($responseApi['err']) { 
			echo "<hr>cURL Error #:" . $responseApi['err']; 
		} else {
			$dataApi = json_decode($responseApi['response'],true);
			$detailUsers = $dataApi['data']['users'];
		}
		############################################################
		$data['biodata'] = @$detailUsers;
		
		$this->load->view('templateAdminLTE',$data);
	}
	function _remap($method){
		$this->index($method);
	}

}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
