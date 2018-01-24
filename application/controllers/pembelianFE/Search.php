<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller { 

	function index(){
		
		$Name = @$_POST['Name'];
		$ScheduleId = @$_POST['ScheduleId'];
		$itemLelang = @$_POST['itemLelang'];
		
		// $Name = 'lut';
		// $ScheduleId = '';
		
		// ------------------------------------------------------------------
		// get groupConcat biodataUser base on nama user
		$biodataIdWhereIn = '';
		$url = linkservice('account')."users/SearchName/?term=".$Name;
		$method = 'GET';
		$responseApi = admsCurl($url, array(), $method);
		if ($responseApi['err']) { 
			echo "<hr>cURL Error #:" . $responseApi['err']; 
		} else {
			$dataApi = json_decode($responseApi['response'],true);
			$allBiodata = $dataApi['data'];
		}
		foreach($allBiodata as $row){
			$detailBiodata[$row['UserId']] = $row;
			$biodataIdWhereIn = $row['groupConcat'];
		}
		// ------------------------------------------------------------------
		
		// ------------------------------------------------------------------
		// get schedule
		$arrScheduleId = array();
		$url = linkservice('npl')."counter/transaksidetail/search";
		$method = 'POST';
		$responseApi = admsCurl($url, array('ScheduleId'=>@$ScheduleId, 'BiodataId'=> @$biodataIdWhereIn, 'itemLelang'=> @$itemLelang), $method);
		if ($responseApi['err']) { 
			echo "<hr>cURL Error #:" . $responseApi['err']; 
		} else {
			$dataApi = json_decode($responseApi['response'],true);
			$allTransaksiDetail = $dataApi['data'];
		}
		foreach($allTransaksiDetail as $row){
			if (!in_array($row['ScheduleId'], $arrScheduleId))
				$arrScheduleId[] = $row['ScheduleId'];
		}
		// ------------------------------------------------------------------
		
		
		
		
		
		// ------------------------------------------------------------------
		// get master schedule
		$listJadwal = array();
		$schedule = array();
		$url = linkservice('master')."schedule/GetArray";
		$method = 'POST';
		$responseApi = admsCurl($url, $arrScheduleId, $method);
		if ($responseApi['err']) { 
			echo "<hr>cURL Error #:" . $responseApi['err']; 
		} else {
			$dataApi = json_decode($responseApi['response'],true);
			$listJadwal = $dataApi['data'];
		}
		
		if (count($listJadwal) > 0)
			foreach($listJadwal as $row)
				$schedule[$row['ScheduleId']] = $row;
		// ------------------------------------------------------------------
		
		
		
		
		
		
		// ------------------------------------------------------------------
		// data mateng
		foreach($allTransaksiDetail as $row){
			$dataMateng[] = array(
				// 'Name' => $row['Name'],
				'TransactionDetailNPLId' => $row['TransactionDetailNPLId'],
				'TransactionId' => $row['TransactionId'],
				'DateTransactionNPL' => substr($row['DateTransactionNPL'],0,10),
				'CodeTransactionNPL' => $row['CodeTransactionNPL'],
				
				'ScheduleCity' => $schedule[$row['ScheduleId']]['ScheduleCity'],
				'ScheduleStartDate' => substr($schedule[$row['ScheduleId']]['ScheduleStartDate'],0,19),
				'ItemName' => $schedule[$row['ScheduleId']]['ItemName'],
				'CompanyName' => $schedule[$row['ScheduleId']]['CompanyName'],
				
				'NPLType' => $row['NPLType'],
				'Name' => $detailBiodata[$row['BiodataId']]['Name'],
				'StsPaid' => $row['StsPaid'],
				'StsCanceled' => $row['StsCanceled'],
				'CreateDate' => $row['CreateDate'],
				'ModifyDate' => $row['ModifyDate'],
				'status' => ($row['StsPaid'] == 1 ? 'Aktif/Bayar' : ($row['StsCanceled'] == 1 ? 'Cancel' : 'Belum Bayar')),
				'btn' => '
						<div class="btn-group">
							<a href="'.site_url('counter/pembelian/detail/'.$row['TransactionId']).'" class="btn btn-info btn-xs ttipDatatables" data-provide="tooltip" data-placement="top" title="" data-original-title="Lihat"><i class="fa fa-eye"></i></a>
						</div>
						',
				// <div class="btn-group">
					// <a href="http://ibidadmsdevweb.azurewebsites.net/index.php/users/detail/5119" class="btn btn-info btn-xs ttipDatatables" data-provide="tooltip" data-placement="top" title="" data-original-title="Lihat"><i class="fa fa-eye"></i></a>
					// <a href="http://ibidadmsdevweb.azurewebsites.net/index.php/users/edit/5119" class="btn btn-success btn-xs ttipDatatables" data-provide="tooltip" data-placement="top" title="" data-original-title="Ubah"><i class="fa fa-pencil"></i></a>
					// <a href="http://ibidadmsdevweb.azurewebsites.net/index.php/users/delete/5119" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
					// </div>
			);
		}
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST, GET');
		header('Access-Control-Allow-Headers: Origin');
		header('Content-Type: application/json');

		echo json_encode(@$dataMateng);
		// ------------------------------------------------------------------
		
		
		
		
		
		
		

	}

}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
