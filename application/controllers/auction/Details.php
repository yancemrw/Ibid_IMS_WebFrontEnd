<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// $scheduleURL = 'http://alpha.ibid.astra.co.id/backend/serviceams/auction/api/multicurrentlot';
			// $scheduleURL = 'http://ibid-ams-auction.development.net/api/multicurrentlot'; //user on local 
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
