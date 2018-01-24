<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_schedule extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
	}

	public function index() {
		// http://ibid-ams-schedule.stagingapps.net/api/schedulelist?company_id=2&startdate=2017-01-03&enddate=2017-12-22&
		// print_r($_REQUEST);
		$startdate = date('Y-m-d', @$_REQUEST['start']);
		$enddate = date('Y-m-d', @$_REQUEST['end']);
		$company_id = @$_REQUEST['thisCabang'];
		
		$cbCar = @$_REQUEST['cbCar'];
		$cbMtr = @$_REQUEST['cbMtr'];
		$cbHve = @$_REQUEST['cbHve'];
		$cbGad = @$_REQUEST['cbGad'];
		
		if ($cbCar == '' && $cbMtr == '' && $cbHve == '' && $cbGad == '' ){
			$cbCar = 1;
			$cbMtr = 1;
			$cbHve = 1;
			$cbGad = 1;
		}
		
		
		// Get unit
		$lunit = 'http://ibidadmsdevservicemasterdata.azurewebsites.net/index.php/item/get';
		$cunit = admsCurl($lunit, array(), 'GET');

		// Get company list
		$link1 = 'http://ibidadmsdevservicemasterdata.azurewebsites.net/index.php/cabang/get';
		$company_list = admsCurl($link1, array(), 'GET');
		$arrCompany = array();
		foreach(curlGenerate($company_list) as $key => $value) {
			$arrCompany[$value->CompanyId]['CompanyName'] = $value->CompanyName;
			$arrCompany[$value->CompanyId]['Address'] = $value->Address;
		}

		// Get schedule list
		// $link2 = 'http://ibid-ams-schedule.stagingapps.net/api/schedulelist?untilnextmonth=1';
		$link2 = 'http://ibid-ams-schedule.stagingapps.net/api/schedulelist?company_id='.$company_id.'&startdate='.$startdate.'&enddate='.$enddate;
		$schedule = amsCurl($link2, '', 'GET');
		$data_schedule = curlGenerate($schedule);
		
		$eventMobil = array();
		$eventMotor = array();
		$eventHve = array();
		$eventGadget = array();
		foreach($data_schedule as $keys => $values) {
			$evenCall = array(
				'title' => date('d F Y H:i:s', strtotime($values->date.$values->waktu)),
				'start' => date('Y-m-d', strtotime($values->date.$values->waktu)),
				'end' => date('Y-m-d', strtotime($values->date.$values->waktu)),
				'allDay' => false,
			);
			
			if ($values->ItemName == 'MOBIL' && $cbCar == 1){
				$evenCall['className'] = 'car-event';
				if (count(@$eventMobil) < 4)
					$eventMobil[] = $evenCall;
			}
			if ($values->ItemName == 'MOTOR' && $cbMtr == 1){
				$evenCall['className'] = 'motor-event';
				if (count(@$eventMotor) < 4)
					$eventMotor[] = $evenCall;
			}
			if ($values->ItemName == 'HVE' && $cbHve == 1){
				$evenCall['className'] = 'hve-event';
				if (count(@$eventHve) < 4)
					$eventHve[] = $evenCall;
			}
			if ($values->ItemName == 'GADGET' && $cbGad == 1){
				$evenCall['className'] = 'gadget-event';
				if (count(@$eventGadget) < 4)
					$eventGadget[] = $evenCall;
			}
			
			// $arrData[$keys]->Address = $arrCompany[$values->company_id]['Address'];
		}
		$arrayReturn = array_merge($eventMobil, $eventMotor, $eventHve, $eventGadget);
		
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: POST, GET');
		header('Access-Control-Allow-Headers: Origin');
		header('Content-Type: application/json');
		echo json_encode($arrayReturn);
		// echo '<pre>';
		// print_r($data_schedule);
		
	}

}

/* End of file live.php */
/* Location: ./application/controllers/auction/live.php */