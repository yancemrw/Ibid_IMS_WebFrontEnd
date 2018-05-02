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
		$startdate = date('Y-m-d', @$_GET['start']);
		$enddate = date('Y-m-d', @$_GET['end']);
		$company_id = @$_GET['thisCabang'];
		
		$cbCar = @$_GET['cbCar'];
		$cbMtr = @$_GET['cbMtr'];
		$cbHve = @$_GET['cbHve'];
		$cbGad = @$_GET['cbGad'];
		
		if ($cbCar == '' && $cbMtr == '' && $cbHve == '' && $cbGad == '' ){
			$cbCar = 1;
			$cbMtr = 1;
			$cbHve = 1;
			$cbGad = 1;
		}
		
		

		// Get company list
		$link1 = linkservice('master')."cabang/get";
		$company_list = admsCurl($link1, array(), 'GET');
		$arrCompany = array();
		foreach(curlGenerate($company_list) as $key => $value) {
			$arrCompany[$value->CompanyId]['CompanyName'] = $value->CompanyName;
			$arrCompany[$value->CompanyId]['Address'] = $value->Address;
			$arrCompany[$value->CompanyId]['AliasName'] = $value->AliasName;
		}

		// Get schedule list
		// $link2 = 'http://ibid-ams-schedule.stagingapps.net/api/schedulelist?untilnextmonth=1';
		// $link2 = 'http://ibid-ams-schedule.stagingapps.net/api/schedulelist?company_id='.$company_id.'&startdate='.$startdate.'&enddate='.$enddate;
		$link2 = linkservice('AMSSCHEDULE').'schedulelist?company_id='.$company_id.'&startdate='.$startdate.'&enddate='.$enddate;
		$schedule = amsCurl($link2, '', 'GET');
		$data_schedule = curlGenerate($schedule);
		
		$eventMobil = array();
		$eventMotor = array();
		$eventHve = array();
		$eventGadget = array();
		
		$eventThisMobil = array(); 
		$eventThisMotor = array();
		$eventThisHve = array();
		$eventThisGadget = array();
		foreach($data_schedule as $keys => $values) {
			$evenCall = array(
				'title' => $arrCompany[$values->company_id]['AliasName'],
				// 'title' => date('d F Y H:i:s', strtotime($values->date.$values->waktu)),
				'start' => date('Y-m-d', strtotime($values->date.$values->waktu)),
				'end' => date('Y-m-d', strtotime($values->date.$values->waktu)),
				'allDay' => false,
				'aliasName' => $arrCompany[$values->company_id],
			);
			
			if ($values->ItemName == 'MOBIL' && $cbCar == 1){
				$evenCall['className'] = 'car-event';
				if (count(@$eventMobil[$evenCall['start']]) < 4){
					$eventMobil[$evenCall['start']][] = $evenCall;
					$eventThisMobil[] = $evenCall;
				}
			}
			if ($values->ItemName == 'MOTOR' && $cbMtr == 1){
				$evenCall['className'] = 'motor-event';
				if (count(@$eventMotor[$evenCall['start']]) < 4){
					$eventMotor[$evenCall['start']][] = $evenCall;
					$eventThisMotor[] = $evenCall;
				}
			}
			if ($values->ItemName == 'HVE' && $cbHve == 1){
				$evenCall['className'] = 'hve-event';
				if (count(@$eventHve[$evenCall['start']]) < 4){
					$eventHve[$evenCall['start']][] = $evenCall;
					$eventThisHve[] = $evenCall;
				}
			}
			if ($values->ItemName == 'GADGET' && $cbGad == 1){
				$evenCall['className'] = 'gadget-event';
				if (count(@$eventGadget[$evenCall['start']]) < 4){
					$eventGadget[$evenCall['start']][] = $evenCall;
					$eventThisGadget[] = $evenCall;
				}
			}
			
			// $arrData[$keys]->Address = $arrCompany[$values->company_id]['Address'];
		}
		$arrayReturn = array_merge($eventThisMobil, $eventThisMotor, $eventThisHve, $eventThisGadget);
		
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