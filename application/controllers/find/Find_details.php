<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find_details extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index($id) {
		// get detail item
		$url1 = linkservice('stock')."itemStock/detail/".$id;
		$method1 = 'GET';
		$res1 = admsCurl($url1, array(), $method1);
		$detail = curlGenerate($res1);

		// get detail photo
		$url2 = linkservice('taksasi')."icar/getimage?AuctionItemId=".$id;
		$method2 = 'GET';
		$res2 = admsCurl($url2, array(), $method2);
		$detailphoto = curlGenerate($res2);

		// get grade item
		$url3 = linkservice('taksasi')."nilaiicar/detail?AuctionItemId=".$id;
		$method3 = 'GET';
		$res3 = admsCurl($url3, array(), $method3);
		$detailgrade = curlGenerate($res3);

		// get grade item detail
		$url4 = linkservice('taksasi')."nilaiicardetail/get?AuctionItemId=".$id;
		$method4 = 'GET';
		$res4 = admsCurl($url4, array(), $method4);
		$detailicar = curlGenerate($res4);

		$data = array(
			'header_white' => "header-white",
			'userdata'	=> $this->userdata,
			'title' => 'Rincian Kendaraan',
			'form_auth_mobile' => login_status_form_mobile($this->userdata),
			'form_auth'	=> login_Status_form($this->userdata),
			'data'	=> $detail,
			'dataphoto' => $detailphoto,
			'dataharga' => $this->currency_format($detail[0]->FinalPriceItem),
			'grade' => $detailgrade->TotalEvaluationResult,
			'gradeinternal' => $detailicar,
			'link_detail' => base_url('index.php/detail_lelang'),
			'img_rec' => $detailphoto[6]->ImagePath
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