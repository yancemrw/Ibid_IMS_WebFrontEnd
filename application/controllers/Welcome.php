<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// echo "frontend";
		redirect('auth/login');
		// admsapi(200 , 1, 'Welcome to Service Front End' , '');
	}

	public function sms()
	{
		$this->load->view('sms');
	}

	public function sms2()
	{
		$this->load->view('sms2');
	}
	
	public function d360($id)
	{
		$url = linkservice('taksasi').'scheduleitemimg/Get/'.$id;
		$method = 'GET';
		$responseApi = admsCurl($url, array(), $method);
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else {
			$dataApiImg = json_decode($responseApi['response'],true);
		}
		$data['imgList'] = $dataApiImg['data'];
		
		## cek untuk ada 360 img
		$is360 = false;
		if(@$dataApiImg['data']) {
			foreach($data['imgList'] as $row) {
				if ($row['Is360'] == 1) {
					$is360 = true;
					$img = $row['FullPath'];
				}
			}
		}
		//$data['is360'] = $is360;
		$link_img = (strpos("http", @$img) ? @$img : "http:".@$img);
		$bs = base64_encode(file_get_contents($link_img));
		$data['img'] = "data:image/png;base64,".$bs;
		$this->load->view('360', $data);
	}
	
	

}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */
