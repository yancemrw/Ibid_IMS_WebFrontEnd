<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrusted_booking extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global', 'omni'));
		$this->AccessApi = new AccessApi(array('client_id' => 'ADMS Web', 'client_secret' => '1234567890', 'username' => 'rendhy.wijayanto@sera.astra.co.id'));
		$this->AccessApi->redirect_url = site_url('login');
		$this->AccessApi->check_login();
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {
		$data = array(
			'header_white'	=> "header-white",
			'userdata'		=> $this->userdata,
			'title'			=> 'Titip Lelang',
			'form_auth_mobile' => login_status_form_mobile($this->userdata),
			'form_auth'		=> login_Status_form($this->userdata)
		);
		
		##################################
		## form dinamis booking taksasi ##
		##################################
		// mobil
		$url = linkservice('stock') ."item/add/getaddbookingtaksasi?id=6"; 
		$method = 'GET'; 
		$responseApi = admsCurl($url, array(), $method); 
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else { 
			$dataApiDetailsMobil = json_decode($responseApi['response'],true); 
		} 
		$data['formDinamisMobil'] = @$dataApiDetailsMobil['formDinamis']; 
		
		// motor
		$url = linkservice('stock') ."item/add/getaddbookingtaksasi?id=7"; 
		$method = 'GET'; 
		$responseApi = admsCurl($url, array(), $method); 
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else { 
			$dataApiDetailsMotor = json_decode($responseApi['response'],true); 
		} 
		$data['formDinamisMotor'] = @$dataApiDetailsMotor['formDinamis']; 
		
		// hve
		$url = linkservice('stock') ."item/add/getaddbookingtaksasi?id=14"; 
		$method = 'GET'; 
		$responseApi = admsCurl($url, array(), $method); 
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else { 
			$dataApiDetailsHve = json_decode($responseApi['response'],true); 
		} 
		$data['formDinamisHve'] = @$dataApiDetailsHve['formDinamis']; 
		
		// gadget
		$url = linkservice('stock') ."item/add/getaddbookingtaksasi?id=12"; 
		$method = 'GET'; 
		$responseApi = admsCurl($url, array(), $method); 
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else { 
			$dataApiDetailsGadget = json_decode($responseApi['response'],true); 
		} 
		$data['formDinamisGadget'] = @$dataApiDetailsGadget['formDinamis']; 
		######################################
		## END form dinamis booking taksasi ##
		######################################
		
		
		############################################################
        ## get cabang
        $url = linkservice('master')."cabang/get";  
        $method = 'GET';
        $responseApi = admsCurl($url, array('tipePengambilan'=>'dropdownlist'), $method);
        if ($responseApi['err']) { 
            echo "<hr>cURL Error #:" . $responseApi['err']; 
        } else {
            $dataApi = json_decode($responseApi['response'],true);
            $cabang = $dataApi['data'];
        }
        $data['cabang'] = @$cabang;
        ############################################################
		
		$view = "auction/entrusted_booking";
		template($view, $data);
	}

	function saveBooking(){
		// echo '<pre>';
		
		$isStock = false;
		
		$ScheduleBookingCalendarId = @$_POST['ScheduleBookingCalendarId'];
		
		$_POST['iditem'] = @$_POST['tipe-object'];
		$_POST['id_cabang'] = @$_POST['cabang'];
		$_POST['userid'] = @$_SESSION['userdata']['UserId'];
		$_POST['cttn_pndftrn'] = @$_POST['deskripsi'];
		
		## insert ke stock
		$dataInsert = $_POST;
		$url = linkservice('stock') ."itemstock/add/";
		$method = 'POST';
		$responseApi = admsCurl($url, $dataInsert, $method);
		if ($responseApi['err']) {
			echo "<hr>cURL Error #:" . $responseApi['err'];
		} else {
			$dataApi = json_decode($responseApi['response'],true);
			$rowAuctionItem = $dataApi['data'];
			$AuctionItemId = @$rowAuctionItem[0];
			$isStock = true;
		}
		
		
		if ($isStock){
			## GET data stok Detail
			$url = linkservice('stock').'itemstock/detail/'.$AuctionItemId;
			$method = 'GET';
			$responseApi = admsCurl($url, array(), $method);
			if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else {
				$dataApiDetail = json_decode($responseApi['response'],true);
			}
			$detailAuctionItem = $dataApiDetail['data'][0];
			
			## send data insert booking taksasi item
			$dataInsert = array(
				'ScheduleId' => $ScheduleBookingCalendarId,
				'Merk' => $detailAuctionItem['merk'],
				'Model' => $detailAuctionItem['seri'],
				'Serial' => $detailAuctionItem['nopolisi'],
				'Year' => $detailAuctionItem['tahun'],
				'CreateUser' => @$_SESSION['userdata']['UserId'],
				'AuctionItemId' => $AuctionItemId,
			);
			$url = linkservice('taksasi') .'scheduleitem/add';
			$method = 'POST';
			$responseApi = admsCurl($url, $dataInsert, $method);	
			if ($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			} else {
				// echo '<hr>';
				$responseApiInsert = json_decode($responseApi['response'], true);
				
				$this->session->set_flashdata('message', array('success', 'Data Titip Lelang Berhasil Disimpan'));
				redirect('titip-lelang-booking','refresh');
				// echo json_encode($responseApiInsert);
			}
			
		} 
		else {
			$this->session->set_flashdata('message', array('warning', 'Data Titip Lelang, Gagal Disimpan'));
			redirect('titip-lelang-booking','refresh');
		}
		
		// print_r(@$detailAuctionItem);
		// print_r(@$responseApi);
		
	}
}

/* End of file Entrusted_booking.php */
/* Location: ./application/controllers/auction/Entrusted_booking.php */