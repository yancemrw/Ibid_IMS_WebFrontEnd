<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Npl_manage extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global', 'omni'));
		$this->AccessApi = new AccessApi(array('client_id' => 'ADMS Web', 'client_secret' => '1234567890', 'username' => 'rendhy.wijayanto@sera.astra.co.id'));
		$this->AccessApi->redirect_url = site_url('auth/login');
		$this->AccessApi->check_login();
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {
		$data = array(
			'header_white'		=> "header-white",
			'userdata'			=> $this->userdata,
			'title'				=> 'Manajemen NPL',
			'form_auth_mobile'	=> login_status_form_mobile($this->userdata),
			'form_auth'			=> login_Status_form($this->userdata)
		);
		$data['img_link'] = base_url('assetsfront/images/icon/ic_avatar.png');
		
		$userdata = $this->session->userdata('userdata');
		$userid_login = isset($userdata['UserId']) ? $userdata['UserId'] : 0;
		$url = linkservice('npl')."counter/npl/searchAll?BiodataId=".$userid_login;
		// die();
		$method = 'GET';
		$responseApi = admsCurl($url, array('BiodataId' => @$userdata['UserId']), $method);
		$listNpl = curlGenerate($responseApi);

		//echo "<pre>"; print_r($listNpl); exit();
		
		$arrScheduleId = array();
		$arrItemId = array();
		$arrCompanyId = array();
		$allListNpl = array();
		foreach($listNpl as $row){
			if ($row->Active != ''){
				
				if (!in_array($row->ScheduleId, $arrScheduleId))
					$arrScheduleId[] = $row->ScheduleId;
				
				if (!in_array($row->ItemId, $arrItemId))
					$arrItemId[] = $row->ItemId;
				
				if (!in_array($row->CompanyId, $arrCompanyId))
					$arrCompanyId[] = $row->CompanyId;
				$allListNpl[] = $row;
			}
			
		}
		$data['listNpl'] = $allListNpl;
		
		// print_r(@$arrScheduleId);
		// print_r(@$arrItemId);
		// print_r(@$arrCompanyId);
		// die();
		
		############################################################
		## detailCabang
		$detailCabang = array();
		$url = linkservice('master')."cabang/get";
		$method = 'GET';
		$responseApi = admsCurl($url, array(), $method);
		if ($responseApi['err']) { 
			echo "<hr>cURL Error master cabang #:" . $responseApi['err']; 
		} else {
			$dataApi = json_decode($responseApi['response'],true);
			$allCabang = $dataApi['data'];
			foreach($allCabang as $row)
				$detailCabang[$row['CompanyId']] = $row;
			
		}
		$data['detailCabang'] = @$detailCabang;
		############################################################
		
		// print_r($schedule);
		// print_r($detailItem);
		// print_r($detailCabang);
		
		$view = "akun/npl_manage";
		template($view, $data);
	}

	function loadTable() {
		/* Start - DetailItem */
		$detailItem = array();
		$url = linkservice('master')."item/get";
		$method = 'GET';
		$responseApi = admsCurl($url, array(), $method);
		if ($responseApi['err']) { 
			echo "<hr>cURL Error master item #:" . $responseApi['err']; 
		}
		else {
			$dataApi = json_decode($responseApi['response'],true);
			$allItem = $dataApi['data'];
			foreach($allItem as $row) {
				$detailItem[$row['ItemId']] = $row;
			}
		}
		/* End */

		$id = $this->input->get('UserId');
		$url = linkservice('npl')."counter/npl/searchAll?BiodataId=".$id;
		$method = 'GET';
		$responseApi = admsCurl($url, array('BiodataId' => @$userdata['UserId']), $method);
		$listNpl = curlGenerate($responseApi); //echo "<pre>"; print_r($listNpl); exit;

		/* Start - DetailJadwal */
		$arrScheduleId = array();
		$arrItemId = array();
		$arrCompanyId = array();
		$allListNpl = array();
		foreach($listNpl as $row) {
			if($row->Active != '') {
				if(!in_array($row->ScheduleId, $arrScheduleId)) $arrScheduleId[] = $row->ScheduleId;
				if(!in_array($row->ItemId, $arrItemId)) $arrItemId[] = $row->ItemId;
				if(!in_array($row->CompanyId, $arrCompanyId)) $arrCompanyId[] = $row->CompanyId;
				$allListNpl[] = $row;
			}
		}

		$schedule = array();
		$listJadwal = array();
		for($i = 0; $i < count($arrScheduleId); $i++) {
			$ScheduleId = $arrScheduleId[$i];
			$url = linkservice('AMSSCHEDULE')."scheduledetail/".$ScheduleId;
			$method = 'GET';
			$responseApi = amsCurl($url, array(), $method);
			if($responseApi['err']) { 
				$listJadwal[] = "<hr>cURL Error schedule #:" . $responseApi['err']; 
			}
			else {
				$dataApi = json_decode($responseApi['response'],true);
				$listJadwal[] = $dataApi['data'];
			}
		}
		foreach($listJadwal as $row) {
			$schedule[$row['id']] = $row;
		}
		/* End */

		$arr = array();
		foreach($listNpl as $key => $value) {
			if($value->Active === 1 && $value->IsUsed === null) {
				$stat = 'Tersedia';
			}
			else if($value->Active === 0 && $value->IsUsed === 1) {
				$stat = 'Menang';
			}
			else if($value->Active === 1 && $value->IsUsed === 0) {
				$stat = 'Kalah';
			}

			$date = '';
			if($value->ScheduleId > 0) {
				$cek_schedule = (@$schedule[$value->ScheduleId]['waktu']) ? ', '.@$schedule[$value->ScheduleId]['waktu'] : '';
				$cek_company = (@$schedule[$value->ScheduleId]['CompanyName']) ? @$schedule[$value->ScheduleId]['CompanyName'].'<br />' : '';
				$date .= $cek_company;
				$date .= date('d F Y',strtotime(@$schedule[$value->ScheduleId]['date'])).$cek_schedule;
			}

			$arr[$key][] = ($key + 1);
			$arr[$key][] = $value->NPLNumber;
			$arr[$key][] = @$detailItem[$value->ItemId]['ItemName'];
			$arr[$key][] = $value->NPLType;
			$arr[$key][] = $date;
			$arr[$key][] = $stat;
		}
		$arrData['data'] = $arr;
		echo json_encode($arrData);
	}

}

/* End of file Npl_manage.php */
/* Location: ./application/controllers/akun/Npl_manage.php */
