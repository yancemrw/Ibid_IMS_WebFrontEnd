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
		$url = linkservice('npl')."counter/npl/searchAll/";
		$method = 'GET';
		$responseApi = admsCurl($url, array('BiodataId' => $userdata['UserId']), $method);
		$listNpl = curlGenerate($responseApi);
		
		
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
		## detailJadwal
		$schedule = array();
		$listJadwal = array();
		for($i=0; $i<count($arrScheduleId); $i++){
			$ScheduleId = $arrScheduleId[$i];
			
			$url = linkservice('AMSSCHEDULE')."scheduledetail/".$ScheduleId;
			$method = 'GET';
			$responseApi = amsCurl($url, array(), $method);
			if ($responseApi['err']) { 
				echo "<hr>cURL Error schedule #:" . $responseApi['err']; 
			} else {
				$dataApi = json_decode($responseApi['response'],true);
				$listJadwal[] = $dataApi['data'];
			}
		}
		
		foreach($listJadwal as $row)
			$schedule[$row['id']] = $row;
		
		$data['schedule'] = @$schedule;
		############################################################
		
		
		############################################################
		## detailItem
		$detailItem = array();
		$url = linkservice('master')."item/get";
		$method = 'GET';
		$responseApi = admsCurl($url, array(), $method);
		if ($responseApi['err']) { 
			echo "<hr>cURL Error master item #:" . $responseApi['err']; 
		} else {
			$dataApi = json_decode($responseApi['response'],true);
			$allItem = $dataApi['data'];
			foreach($allItem as $row)
				$detailItem[$row['ItemId']] = $row;
			
		}
		$data['detailItem'] = @$detailItem;
		############################################################
		
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

}

/* End of file Npl_manage.php */
/* Location: ./application/controllers/akun/Npl_manage.php */