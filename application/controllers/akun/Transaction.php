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
			'title'				=> 'Transaksi',
			'form_auth_mobile'	=> login_status_form_mobile($this->userdata),
			'form_auth'			=> login_Status_form($this->userdata),
			'cabang'			=> $getCabang
		);
		$data['img_link'] = base_url('assetsfront/images/icon/ic_avatar.png');
		$view = "akun/transaction";
		template($view, $data);
	}

	function getWinnerDatatables($type) {
		// MsItem
		$urlItem = linkservice('master')."item/Get";
		$methodItem = 'GET';
		$resApiItem = admsCurl($urlItem, array(), $methodItem);
		$getItem = curlGenerate($resApiItem);
		$arrItem = array();
		foreach ($getItem as $keyItem => $valItem) {
			$arrItem[$valItem->ItemId] = $valItem->ItemName;
		}

		switch($type) {
			case 'jual':
				// get data winner
				$urlWinner = linkservice('stock')."winner/Get?pemilik=".$this->userdata['UserId'];
				$methodWinner = 'GET';
				$resWinner = admsCurl($urlWinner, array(), $methodWinner);
				$getWinner = curlGenerate($resWinner);
				
				$arr = array();
				foreach($getWinner as $key => $value) {
					$status = 'Belum Dilunasi';
					$imgStep_1_no = '<img src="'.base_url('assetsfront/images/icon/ic_transaction_step_1_grey.png').'" class="margin-0-3px" />';
					$imgStep_2_no = '<img src="'.base_url('assetsfront/images/icon/ic_transaction_step_2_grey.png').'" class="margin-0-3px" />';
					$imgStep_3_no = '<img src="'.base_url('assetsfront/images/icon/ic_transaction_step_3_grey.png').'" class="margin-0-3px" />';
					$imgStep_4_no = '<img src="'.base_url('assetsfront/images/icon/ic_transaction_step_4_grey.png').'" class="margin-0-3px" />';

					$imgStep_1_yes = '<img src="'.base_url('assetsfront/images/icon/ic-transaksi-pembelian-1.png').'" class="margin-0-3px" />';
					$imgStep_2_yes = '<img src="'.base_url('assetsfront/images/icon/ic-transaksi-pembelian-2.png').'" class="margin-0-3px" />';
					$imgStep_3_yes = '<img src="'.base_url('assetsfront/images/icon/ic-transaksi-pembelian-3.png').'" class="margin-0-3px" />';
					$imgStep_4_yes = '<img src="'.base_url('assetsfront/images/icon/ic-transaksi-pembelian-4.png').'" class="margin-0-3px" />';

					if($value->IsPaid === "0") { // 0 = lunas, 1 = belum lunas
						$images1 = $imgStep_1_yes;
						$status = 'Pelunasan Oleh Pemenang';
					}
					else {
						$images1 = $imgStep_1_no;
					}
					if($value->IsTakeOutSPPU == "1") { // 0 = belum diambil, 1 = sudah diambil
						$images2 = $imgStep_2_yes;
						$status = 'Serah Terima Kendaraan Kepada Pemenang';
					}
					else {
						$images2 = $imgStep_2_no;
					}
					$images3 = $imgStep_3_no;
					$images4 = $imgStep_4_no;

					$arr[$key][] = ($key + 1);
					$arr[$key][] = $value->nopolisi;
					$arr[$key][] = $value->merk.' '.$value->seri.' '.$value->silinder.' '.$value->model.' '.$value->transmisi.'<br />'.$value->tahun;
					$arr[$key][] = $arrItem[$value->ItemId];
					$arr[$key][] = 'Rp. '.$this->number_formated($value->Billing);
					$arr[$key][] = $value->ScheduleAuctionWinnerCompany.'<br>'.$value->ScheduleAuctionWinnerDate;
					//$arr[$key][] = '<a href="#" class="step-transaction">'.$images1.$images2.$images3.$images4.'<p>'.$status.'</p></a>';
				}
				$arrData['data'] = $arr;
				echo json_encode($arrData);
			break;

			case 'beli':
				// get data winner
				$urlWinner = linkservice('stock')."winner/Get?userid=".$this->userdata['UserId'];
				$methodWinner = 'GET';
				$resWinner = admsCurl($urlWinner, array(), $methodWinner);
				$getWinner = curlGenerate($resWinner);
				
				$arr = array();
				foreach($getWinner as $key => $value) {
					$keteranganStatus = 'Belum Dilunasi';
					$imgStep_1_no = '<img src="'.base_url('assetsfront/images/icon/ic_transaction_step_1_grey.png').'" />';
					$imgStep_2_no = '<img src="'.base_url('assetsfront/images/icon/ic_transaction_step_2_grey.png').'" />';
					$imgStep_3_no = '<img src="'.base_url('assetsfront/images/icon/ic_transaction_step_3_grey.png').'" />';
					$imgStep_4_no = '<img src="'.base_url('assetsfront/images/icon/ic_transaction_step_4_grey.png').'" />';

					$images1 = $imgStep_1_no;
					if($value->IsPaid == 1) {
						$images2 = $imgStep_2_no;
					}
					else {
						$images2 = $imgStep_2_no;
					}
					
					if($value->IsTakeOutSPPU == 1) {
						$images3 = $imgStep_3_no;
					}
					else {
						$images3 = $imgStep_3_no;
					}
					
					$images4 = $imgStep_4_no;

					$arr[$key][] = ($key + 1);
					$arr[$key][] = $value->NPLNumber;
					$arr[$key][] = $value->nopolisi;
					$arr[$key][] = $value->merk.' '.$value->seri.' '.$value->silinder.' '.$value->model.' '.$value->transmisi.'<br />'.$value->tahun;
					$arr[$key][] = $arrItem[$value->ItemId];
					$arr[$key][] = 'Rp. '.$this->number_formated($value->Billing);
					$arr[$key][] = $value->ScheduleAuctionWinnerCompany.'<br>'.$value->ScheduleAuctionWinnerDate;
					$arr[$key][] = '<a href="#" class="step-transaction">'.$images1.$images2.$images3.$images4.'</a>';
				}
				$arrData['data'] = $arr;
				echo json_encode($arrData);
			break;
		}

		
	}

	private function number_formated($value) {
		return number_format($value, 0, ",", ".");
	}

}

/* End of file Transaction.php */
/* Location: ./application/controllers/akun/Transaction.php */