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

}

/* End of file Transaction.php */
/* Location: ./application/controllers/akun/Transaction.php */