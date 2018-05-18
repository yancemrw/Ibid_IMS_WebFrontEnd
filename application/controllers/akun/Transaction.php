<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

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
		// get data cabang ibid
		$urlCabang = linkservice('master')."cabang/Get";
		$methodCabang = 'GET';
		$resCabang = admsCurl($urlCabang, array(), $methodCabang);
		$getCabang = curlGenerate($resCabang);

		$data = array(
			'header_white'		=> "header-white",
			'userdata'			=> $this->userdata,
			'title'				=> 'Data Diri',
			'form_auth_mobile'	=> login_status_form_mobile($this->userdata),
			'form_auth'			=> login_Status_form($this->userdata),
			'cabang'			=> $getCabang
		);
		$data['img_link'] = base_url('assetsfront/images/icon/ic_avatar.png');
		$view = "akun/transaction";
		template($view, $data);
	}

	function getWinnerDatatables($type) {
		switch($type) {
			case 'jual': $param = 'pemilik='.$this->userdata['UserId']; break;
			case 'beli': $param = 'userid='.$this->userdata['UserId']; break;
		}

		// MsItem
		$urlItem = linkservice('master')."item/Get";
		$methodItem = 'GET';
		$resApiItem = admsCurl($urlItem, array(), $methodItem);
		$getItem = curlGenerate($resApiItem);

		// get data winner
		$urlWinner = linkservice('stock')."winner/Get?".$param;
		$methodWinner = 'GET';
		$resWinner = admsCurl($urlWinner, array(), $methodWinner);
		$getWinner = curlGenerate($resWinner);
		
		$arr = array();
		foreach($getWinner as $key => $value) {
			$keteranganStatus = 'Belum Dilunasi';
			$imgStep_1 = base_url('assetsfront/images/icon/ic_transaction_step_1_grey.png');
			$imgStep_2 = base_url('assetsfront/images/icon/ic_transaction_step_2_grey.png');
			$imgStep_3 = base_url('assetsfront/images/icon/ic_transaction_step_3_grey.png');
			$imgStep_4 = base_url('assetsfront/images/icon/ic_transaction_step_4_grey.png');
			if($value->IsPaid == 1) {
				$imgStep_1 = base_url('assetsfront/images/icon/ic_transaction_step_1.png');
				$keteranganStatus = '';
				if ($value->IsPaid == 1) {
					
				}
			}
			
			if($value->IsTakeOutSPPU == 1) {
				$keteranganStatus = $keteranganStatus.'<br>Unit Sudah diambil';
			} else {
				$keteranganStatus = $keteranganStatus.'<br>Unit Belum diambil';
			}
			
			$keteranganStatus = $keteranganStatus.'<br>Dokumen Belum diambil';

			$arr[$key][] = ($key + 1);
			$arr[$key][] = $value->NPLNumber;
			$arr[$key][] = $value->nopolisi;
			$arr[$key][] = $value->merk.' '.$value->seri.' '.$value->silinder.' '.$value->model.' '.$value->transmisi.'<br />'.$value->tahun;
			$arr[$key][] = $getItem[$value->ItemId];
			$arr[$key][] = $this->number_formated($value->Billing);
			$arr[$key][] = $value->ScheduleAuctionWinnerCompany.'<br>'.$value->ScheduleAuctionWinnerDate;
			$arr[$key][] = '<a href="#" class="step-transaction">'.$keteranganStatus.'</a>';
		}
		$arrData['data'] = $arr;
		echo json_encode($arrData);
	}

	private function number_formated($value) {
		return number_format($value, 0, ",", ".");
	}

}

/* End of file Transaction.php */
/* Location: ./application/controllers/akun/Transaction.php */