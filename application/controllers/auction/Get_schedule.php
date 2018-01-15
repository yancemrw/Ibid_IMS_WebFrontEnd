<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_schedule extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
	}

	public function index() {
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
		$link2 = 'http://ibid-ams-schedule.stagingapps.net/api/schedulelist?untilnextmonth=1';
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
			
			if ($values->ItemName == 'MOTOR'){
				$evenCall['className'] = 'motor-event';
				if (count(@$eventMotor) < 4)
					$eventMotor[] = $evenCall;
			}
			else if ($values->ItemName == 'MOBIL'){
				$evenCall['className'] = 'car-event';
				if (count(@$eventMobil) < 4)
					$eventMobil[] = $evenCall;
			}
			else if ($values->ItemName == 'HVE'){
				$evenCall['className'] = 'hve-event';
				if (count(@$eventHve) < 4)
					$eventHve[] = $evenCall;
			}
			else if ($values->ItemName == 'GADGET'){
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