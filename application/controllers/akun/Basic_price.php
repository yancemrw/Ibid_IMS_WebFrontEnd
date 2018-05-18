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

		$data = array(
			'header_white'		=> "header-white",
			'userdata'			=> $this->userdata,
			'title'				=> 'Data Diri',
			'form_auth_mobile'	=> login_status_form_mobile($this->userdata),
			'form_auth'			=> login_Status_form($this->userdata),
			'datatable'			=> $get,
			'dataItem'			=> $arrItem
		);
		$data['img_link'] = base_url('assetsfront/images/icon/ic_avatar.png');
		$view = "akun/basic_price";
		template($view, $data);
	}

}

/* End of file Basic_price.php */
/* Location: ./application/controllers/akun/Basic_price.php */