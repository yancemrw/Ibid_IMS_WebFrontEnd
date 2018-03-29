<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find_unit extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {		
		$data = array(
			'header_white' => "header-white",
			'userdata'	=> $this->userdata,
			'title' => 'Cari Kendaraan',
			'form_auth_mobile' => login_status_form_mobile($this->userdata),
			'form_auth'	=> login_Status_form($this->userdata),
			'img' => base_url('assetsfront/images/background/1.jpg'),
			'link_detail' => site_url('detail-lelang')
		);
		
		$itemAttr1 = @$_GET['itemAttr1'];
		$itemAttr2 = @$_GET['itemAttr2'];
		$itemAttr10 = @$_GET['itemAttr10'];
		#################################
		## form dinamis Cari Kendaraan ##
		#################################
		// mobil
		if ($itemAttr1 != "" && $itemAttr2  != ""&& $itemAttr10 != "")
			$url = linkservice('stock') ."item/add/getcarikendaraan?id=6&itemAttr1=".@$itemAttr1."&itemAttr2=".@$itemAttr2."&itemAttr10=".@$itemAttr10;
		else 
			$url = linkservice('stock') ."item/add/getcarikendaraan?id=6"; 
		$method = 'GET'; 
		$responseApi = admsCurl($url, array(), $method); 
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else { 
			$dataApiDetailsMobil = json_decode($responseApi['response'],true); 
		} 
		$data['formDinamisMobil'] = @$dataApiDetailsMobil['formDinamis']; 
		
		// motor
		$url = linkservice('stock') ."item/add/getcarikendaraan?id=7"; 
		$method = 'GET'; 
		$responseApi = admsCurl($url, array(), $method); 
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else { 
			$dataApiDetailsMotor = json_decode($responseApi['response'],true); 
		} 
		$data['formDinamisMotor'] = @$dataApiDetailsMotor['formDinamis']; 
		
		// gadget
		$url = linkservice('stock') ."item/add/getcarikendaraan?id=12"; 
		$method = 'GET'; 
		$responseApi = admsCurl($url, array(), $method); 
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else { 
			$dataApiDetailsGadget = json_decode($responseApi['response'],true); 
		} 
		$data['formDinamisGadget'] = @$dataApiDetailsGadget['formDinamis']; 
		
		// hve
		$url = linkservice('stock') ."item/add/getcarikendaraan?id=14"; 
		$method = 'GET'; 
		$responseApi = admsCurl($url, array(), $method); 
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else { 
			$dataApiDetailsHve = json_decode($responseApi['response'],true); 
		} 
		$data['formDinamisHve'] = @$dataApiDetailsHve['formDinamis']; 
		#####################################
		## END form dinamis Cari Kendaraan ##
		#####################################
		
		$view = "find/find_unit";
		template($view, $data);
	}

	public function iscomming() {
		$data = array(
			'header_white' => "header-white",
			'userdata'	=> $this->userdata,
			'title' => 'Cari Kendaraan',
			'form_auth_mobile' => login_status_form_mobile($this->userdata),
			'form_auth'	=> login_Status_form($this->userdata),
			'img' => base_url('assetsfront/images/background/1.jpg'),
			'link_detail' => base_url('detail-lelang')
		);
		$view = "find/find_unit_iscomming";
		template($view, $data);
	}

}

/* End of file find_unit.php */
/* Location: ./application/controllers/find/find_unit.php */