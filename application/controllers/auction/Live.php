<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Live extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
	}

	public function index() {
		// Get unit
		// $lunit = 'http://ibidadmsdevservicemasterdata.azurewebsites.net/index.php/item/get';
		$lunit = linkservice('MASTER')."item/get";
		$cunit = admsCurl($lunit, array(), 'GET');

		// Get company list
		// $link1 = 'http://ibidadmsdevservicemasterdata.azurewebsites.net/index.php/cabang/get';
		$link1 = linkservice('MASTER')."cabang/get";
		$company_list = admsCurl($link1, array(), 'GET');
		$data_company = curlGenerate($company_list);
		$arrCompany = array();
		foreach($data_company as $key => $value) {
			$arrCompany[$value->CompanyId]['CompanyName'] = $value->CompanyName;
			$arrCompany[$value->CompanyId]['Address'] = $value->Address;
		}

		// Get schedule list
		// $link2 = 'http://alpha.ibid.astra.co.id/backend/serviceams/schedule/api/schedulelist?untilnextweek=1&notFinished=1&type=0&orderByDate=asc';
		$link2 = linkservice('AMSSCHEDULE')."schedulelist?untilnextweek=1&notFinished=1&type=0&orderByDate=asc";
		$schedule = amsCurl($link2, '', 'GET');
		$data_schedule = curlGenerate($schedule);
		$arrData = $data_schedule;
		foreach($data_schedule as $keys => $values) {
			$arrData[$keys]->Address = $arrCompany[$values->company_id]['Address'];
		}

		$userdata = $this->session->userdata('userdata');
		$data = array(
			'header_white' => "header-white",
			'userdata'	=> $userdata,
			'title' => 'Live Auction',
			'form_auth_mobile' => login_status_form_mobile($userdata),
			'form_auth'	=> login_Status_form($userdata),
			'data' => $arrData,
			'data_unit' => curlGenerate($cunit),
		);
		$view = "auction/live";
		template($view, $data);
	}

}

/* End of file live.php */
/* Location: ./application/controllers/auction/live.php */
