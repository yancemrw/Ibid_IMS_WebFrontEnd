<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nplmanagement extends CI_Controller { 

	function __construct() {
        parent::__construct();
        if (!@$_SESSION['idfront']){ redirect(base_url()); }
    }
	
	function index(){
		$data['title']	= 'NPL Management';
		$data['page'] 	= 'pembelian/nplManagement';
		$data['message'] = $this->session->flashdata('message');
		$BiodataId = trim($_SESSION['idfront']);
		
		
		$listNpl = array();
		############################################################
		## get list NPL
		$url = linkservice('npl')."counter/npl/getuser/".$BiodataId;  
		$method = 'GET';
		$responseApi = admsCurl($url, array(), $method);
		if ($responseApi['err']) { 
			echo "<hr>cURL Error #:" . $responseApi['err']; 
		} else {
			$dataApi = json_decode($responseApi['response'],true);
			$listNpl = $dataApi['data'];
		}
		############################################################
		
		
		
		############################################################
		$arrScheduleId = array();
		foreach($listNpl as $row){
			if (!in_array($row['ScheduleId'], $arrScheduleId)){
				$arrScheduleId[] = $row['ScheduleId'];
			}
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
				'CreateDate' => $row['CreateDate'],
			);
		}
		############################################################
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
		
		
		

		// echo '<pre>';
		foreach($npl as $row){
			$AllNPL[] = array(
				'NPLNumber' => $row['NPLNumber'],
				'Cabang' => $schedule[$row['ScheduleId']]['CompanyName'],
				'Item' => $schedule[$row['ScheduleId']]['ItemName'],
				'ScheduleCity' => $schedule[$row['ScheduleId']]['ScheduleCity'],
				'AuctionStartDate' => substr($schedule[$row['ScheduleId']]['AuctionStartDate'],0,10),
				'NPLType' => $row['NPLType'],
				'Active' => $row['Active'],
				'StartDateNPL' => $row['StartDateNPL'],
				'EndDateNPL' => $row['EndDateNPL'],
				'CreateDate' => substr($row['CreateDate'],0,19),
			);
		}
		$data['AllNPL'] = $AllNPL;
		// print_r($rowNpl);
		// echo '</pre>';
		
		$this->load->view('templateAdminLTE',$data);
	}

}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
