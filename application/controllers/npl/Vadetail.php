<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vadetail extends CI_Controller {

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
		
		if (@$_SESSION['userdata']['TransactionId'] > 0){
			$TransactionId = $_SESSION['userdata']['TransactionId'];
			######################
			### Create NPL setelah pembayaran selesai 
			######################
			// $url = linkservice('npl') .'counter/npl/create';
			// $method = 'POST';
			// $responseApi = admsCurl($url, array('TransactionId' => $TransactionId), $method);
			
			######################
			### update transaksi selesai
			######################
			// $postTransaksi['whereData'] = array('TransactionId' => $TransactionId);
			// $postTransaksi['updateData'] = array('StsPaid' => 1, 'ModifyDate' => date('Y-m-d H:i:s'));
			// $url = linkservice('npl') .'counter/transaksi/edit';
			// $method = 'POST';
			// $responseApi = admsCurl($url, $postTransaksi, $method);
			
			
			######################
			### insert/update cmd config
			######################
			// $userdata = $this->session->userdata('userdata');
			// $BiodataId = $userdata['UserId'];
			// $url = linkservice('account')."users/details/".$BiodataId;
			// $method = 'GET';
			// $responseApi = admsCurl($url, array(), $method);
			// if ($responseApi['err']) { 
				// echo "<hr>cURL Error #:" . $responseApi['err']; 
			// } else {
				// $dataApi = json_decode($responseApi['response'],true);
				// $detailUsers = $dataApi['data']['users'];
				
				// // kondisi cek SAPCmdBuyer 
				// if ($detailUsers['SAPCmdBuyer'] == null) $indct = 1;
				// else $indct = 2;
				
				// $url = linkservice('account')."sap/Account/buyer?cmd=".$BiodataId."&indct=".$indct;
				// $responseApi = admsCurl($url, array(), 'GET');
			// }
			
			unset($_SESSION['userdata']['TransactionId']);
		}
		
		if ($_SESSION['userdata']['va'] == 'bca')
			template('npl/Vadetailbca', $data);
		else if ($_SESSION['userdata']['va'] == 'mandiri')
			template('npl/Vadetailmandiri', $data);
		else 
			template('npl/Vadetail', $data);
	}

}

/* End of file Vadetail.php */
/* Location: ./application/controllers/npl/Vadetail.php */