<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find_details extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index($id) {
		$UserId = @$_SESSION['userdata']['UserId'];
		
		// get detail item
		$url1 = linkservice('stock')."itemstock/Detail/".$id;
		$method1 = 'GET';
		$res1 = admsCurl($url1, array(), $method1);
		$detail = curlGenerate($res1);

		// get detail photo
		$url2 = linkservice('taksasi')."icar/getimage?AuctionItemId=".$id;
		// $url2 = linkservice('taksasi')."icar/getimage?AuctionItemId=12403";
		$method2 = 'GET';
		$res2 = admsCurl($url2, array(), $method2);
		$detailphoto = curlGenerate($res2);

		// get grade item
		$url3 = linkservice('taksasi')."nilaiicar/detail?AuctionItemId=".$id;
		// $url3 = linkservice('taksasi')."nilaiicar/detail?AuctionItemId=12403";
		$method3 = 'GET';
		$res3 = admsCurl($url3, array(), $method3);
		$detailgrade = curlGenerate($res3);

		// get grade item detail
		$url4 = linkservice('taksasi')."nilaiicardetail/get?AuctionItemId=".$id;
		// $url4 = linkservice('taksasi')."nilaiicardetail/get?AuctionItemId=12403";
		$method4 = 'GET';
		$res4 = admsCurl($url4, array(), $method4);
		$detailicar = curlGenerate($res4);

		// get getSchedule
		$url1 = linkservice('stock')."lot/get/?AuctionItemId=".$id;
		$method1 = 'GET';
		$res1 = admsCurl($url1, array(), $method1);
		$detailGetSchedule = curlGenerate($res1);
		if (count(@$detailGetSchedule) > 0){
			$schedule = $detailGetSchedule[0]->thisSchedule;
			$lot = $detailGetSchedule[0]->LotNo;
		} else {
			// get data lot
			$schedule = 37; // hardcode
			$lot = 1; // hardcode
		}
		
		
		
		$url = "http://alpha.ibid.astra.co.id/backend/serviceams/lot/api/getLotDataOnline?schedule=$schedule&lot=$lot";
		$datalot = admsCurl($url, array(), 'GET');
		$datalot = json_decode($datalot['response']);
		$date = explode('-',$datalot->schedule->date);
		$time = explode(':',$datalot->schedule->waktu);

		// cek favorit
		$arrFav = array(
			'userid'	=> $this->userdata['UserId'], 
			'auctionid'	=> $detail[0]->AuctionItemId
		);
		$urlFav = linkservice('stock')."favorite/Checked";
		$methodFav = 'POST';
		$resFav = admsCurl($urlFav, $arrFav, $methodFav);
		$jsonFav = json_decode($resFav['response']);

		
		$thisNpl = array();
		if ($UserId > 0){
			// get NPL
			$url1 = linkservice('NPL')."counter/npl/searchAll/?BiodataId=".$UserId."&ScheduleId=".$schedule;
			$method1 = 'GET';
			$res1 = admsCurl($url1, array(), $method1);
			$detailGetNpl = curlGenerate($res1);
			if (count(@$detailGetNpl) > 0){
				$thisNpl = $detailGetNpl;
			}
		}
		// echo '<pre>'; print_r($thisNpl); die();
		
// print_r($datalot); die();
		$data = array(
			'header_white' => "header-white",
			'userdata'	=> $this->userdata,
			'title' => 'Rincian Kendaraan',
			'form_auth_mobile' => login_status_form_mobile($this->userdata),
			'form_auth'	=> login_Status_form($this->userdata),
			'data'	=> $detail,
			'dataphoto' => @$detailphoto,
			'dataharga' => $this->currency_format($detail[0]->FinalPriceItem),
			'grade' => @$detailgrade->TotalEvaluationResult,
			'gradeinternal' => @$detailicar,
			'link_detail' => base_url('index.php/detail_lelang'),
			'img_rec' => @$detailphoto[6]->ImagePath,
			'company_id' => $datalot->schedule->company_id,
			'schedule_id' => $datalot->schedule->id,
			'no_lot' => $datalot->lot->no_lot,
			'lot_id' => $datalot->lot->id,
			'startprice' => number_format((int) $datalot->stock->StartPrice + 0,0, '', ','),
			'date' => $date,
			'time' => $time,
			'thisNpl' => @$thisNpl,
			'serverdate' => explode('-',date("Y-m-d-H-i-s-v")),
			'interval' => (int)str_replace(",", "", $datalot->schedule->interval),
			'favAction' => $jsonFav
		);
		$view = "find/find_details";
		template($view, $data);
	}

	function currency_format($value) {
		return number_format($value, 2, ",", ".");
	}

}

/* End of file Find_details.php */
/* Location: ./application/controllers/find/Find_details.php */