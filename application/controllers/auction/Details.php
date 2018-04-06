<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// set refer html if not login
		if($this->session->userdata('userdata') === NULL) {
			setcookie('refer_page', 'live-auction', time() + (86400 * 30), "/");
		}
		
		$this->load->helper(array('global', 'omni'));
		$this->AccessApi = new AccessApi(array('client_id' => 'ADMS Web', 'client_secret' => '1234567890', 'username' => 'rendhy.wijayanto@sera.astra.co.id'));
		$this->AccessApi->redirect_url = site_url('login');
		$this->AccessApi->check_login();
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// $scheduleURL = 'http://alpha.ibid.astra.co.id/backend/serviceams/auction/api/multicurrentlot';
			// $scheduleURL = 'http://ibid-ams-auction.development.net/api/multicurrentlot'; //user on local

			############################################################
			## get cabang
			$url = linkservice('master')."cabang/get";  
			$method = 'GET';
			$responseApi = admsCurl($url, array('tipePengambilan'=>'dropdownlist'), $method);
			if ($responseApi['err']) { 
				echo "<hr>cURL Error #:" . $responseApi['err']; 
			}
			else {
				$dataApi = json_decode($responseApi['response'],true);
				$cabang = $dataApi['data'];
			}
			$data['cabang'] = @$cabang;
			############################################################

			$scheduleURL = linkservice('AMSAUCTION').'multicurrentlot';
			$postData = $this->input->post();
			$schedule = admsCurl($scheduleURL, $postData, 'POST');
			$scheduleData = json_decode($schedule['response']);
			$data = array(
				'header_white' => "header-white",
				'userdata'	=> $this->userdata,
				'title' => 'Halaman Lelang',
				'form_auth_mobile' => login_status_form_mobile($this->userdata),
				'form_auth'	=> login_Status_form($this->userdata),
				'auctionsData'	=> $scheduleData->data,
				'img1' => base_url().'assetsfront/images/background/img-recommend-1.jpg',
				'img2' => base_url().'assetsfront/images/background/img-recommend-2.jpg',
				'img3' => base_url().'assetsfront/images/background/img-recommend-3.jpg',
			);
			
			$thisNpl = array();
			foreach($data['auctionsData'] as $key => $row){
				
				$ScheduleId = $row->ScheduleId;
				$UserId = $this->userdata['UserId'];
				
				if ($UserId > 0){
					// get NPL
					$url1 = linkservice('NPL')."counter/npl/searchAll/?BiodataId=".$UserId."&ScheduleId=".$ScheduleId."&Active=1";
					$method1 = 'GET';
					$res1 = admsCurl($url1, array(), $method1);
					$detailGetNpl = curlGenerate($res1);
					if (count(@$detailGetNpl) > 0){
						$thisNpl[$key] = $detailGetNpl;
					}
				}
			}
			$data['thisNpl'] = $thisNpl;
			// echo '<pre>'; print_r($thisNpl); die();
			
			// get data favorite
			$url = linkservice('stock')."favorite/Lists";
			$method = 'POST';
			$responseApi = admsCurl($url, array('userid' => $this->userdata['UserId']), $method);
			$data['favorite'] = curlGenerate($responseApi);
			// echo '<pre>'; print_r($data['favorite']); die();

			$view = "auction/details";
			template($view, $data);
		}
		else {
			redirect(site_url('live-auction'), 'refresh');
		}
	}

}

/* End of file detail.php */
/* Location: ./application/controllers/auction/detail.php */
