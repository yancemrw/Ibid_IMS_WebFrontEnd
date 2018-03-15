<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metodepembayaran extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->library(array('form_validation', 'cart'));
        $this->load->helper(array('global', 'omni'));
        $this->AccessApi = new AccessApi(array('client_id' => 'ADMS Web', 'client_secret' => '1234567890', 'username' => 'rendhy.wijayanto@sera.astra.co.id'));
		$this->AccessApi->redirect_url = site_url('login');
		$this->AccessApi->check_login();
		$this->userdata = $this->session->userdata('userdata');
    }

	public function index() {
		$data = array(
			// header white untuk selain home, karena menggunakan header yang berwarna putih
			'header_white'		=> "header-white",
			'userdata'			=> $this->userdata,
			'title'				=> 'Beli Nomor Peserta Lelang ( NPL )',
			'form_auth_mobile'	=> login_status_form_mobile($this->userdata),
			'form_auth'			=> login_Status_form($this->userdata)
		);
		
		## detail biodata
		$id = $_SESSION['userdata']['UserId'];
		$url = linkservice('account') ."users/details/".$id;
		$method = 'GET';
		$responseApi = admsCurl($url, array('tipePengambilan' => 'dropdownlist'), $method);
		if($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } 
		else { $dataApiDetail = json_decode($responseApi['response'], true); }
		$detailBiodata = @$dataApiDetail['data']['users'];
		
		$data['detailBiodata'] = $detailBiodata;
		template('npl/metodepembayaran', $data);
	}

}

/* End of file Metodepembayaran.php */
/* Location: ./application/controllers/npl/Metodepembayaran.php */