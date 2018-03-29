<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whislist extends CI_Controller {

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
		// get data favorite
		$url = linkservice('stock')."favorite/Lists";
		$method = 'POST';
		$responseApi = admsCurl($url, array('userid' => $this->userdata['UserId']), $method);
		$data = curlGenerate($responseApi); //echo "<pre>"; print_r($data); exit;

		$dataPrice = array();
		if(count($data) > 0) {
			foreach($data as $key => $row) {
				// get data images
				$urlImg = linkservice('taksasi')."icar/getimage?AuctionItemId=".$row->AuctionItemId;
				$methodImg = 'GET';
				$resImg = admsCurl($urlImg, array('userid' => $this->userdata['UserId']), $methodImg);
				$dataImg = curlGenerate($resImg);

				// get data taksasi
				$urlTaksasi = linkservice('taksasi')."nilaiicar/detail?AuctionItemId=".$row->AuctionItemId;
				$methodTaksasi = 'GET';
				$resTaksasi = admsCurl($urlTaksasi, array('userid' => $this->userdata['UserId']), $methodTaksasi);
				$dataTaksasi = curlGenerate($resTaksasi);

				$dataPrice = $row->FinalPriceItem;
			}
		} echo "<pre>"; print_r($dataPrice); exit;

		$datax = array(
			'header_white'		=> "header-white",
			'userdata'			=> $this->userdata,
			'title'				=> 'Data Diri',
			'form_auth_mobile'	=> login_status_form_mobile($this->userdata),
			'form_auth'			=> login_Status_form($this->userdata),
			'data'				=> $data,
			'imgData'			=> $dataImg,
			'dataTaksasi'		=> $dataTaksasi
		);
		$datax['img_link'] = base_url('assetsfront/images/icon/ic_avatar.png');
		$view = "akun/whislist";
		template($view, $datax);
	}

}

/* End of file Whislist.php */
/* Location: ./application/controllers/akun/Whislist.php */
