<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basic_price extends CI_Controller {

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
		$view = "akun/basic_price";
		template($view, $data);
	}

	function getHargaDasarDatatables() {
		// get harga dasar
		$url = linkservice('stock')."itemstock/GetHargaDasar";
		$method = 'GET';
		$resApi = admsCurl($url, array('id' => $this->userdata['UserId']), $method);
		$get = curlGenerate($resApi);

		// MsItem
		$urlItem = linkservice('master')."item/Get";
		$methodItem = 'GET';
		$resApiItem = admsCurl($urlItem, array(), $methodItem);
		$getItem = curlGenerate($resApiItem);
		$arrItem = array();
		foreach ($getItem as $key => $value) {
			$arrItem[$value->ItemId] = $value->ItemName;
		}

		$arr = array();
		foreach($get as $key => $value) {
			$harga = ($values->FinalPriceItem !== null) ? $values->FinalPriceItem : '0';
			$arr[$key][] = ($key + 1);
			$arr[$key][] = $value->nopolisi;
			$arr[$key][] = $value->merk.' '.$value->seri.' '.$value->silinder.' '.$value->model.' '.$value->transmisi.'<br />'.$value->tahun;
			$arr[$key][] = $arrItem[$value->ItemId];
			$arr[$key][] = $value->CreateDate;
			$arr[$key][] = $this->number_formated($harga);
			$arr[$key][] = '<a href="javascript:void(0)" class="edit-price" onclick="changed(this, \''.$value->AuctionItemId.'\')"><i class="fa fa-pencil"></i></a>';
		}
		$arrData['data'] = $arr;
		echo json_encode($arrData);
	}

	private function number_formated($value) {
		return number_format($value, 0, ",", ".");
	}

}

/* End of file Basic_price.php */
/* Location: ./application/controllers/akun/Basic_price.php */