<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller { 

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('global' , 'omni'));
	}

	function index() {
		$this->load->library('cart');
		
		$data['message'] = $this->session->flashdata('message');

		############################################################
		$id = trim($_SESSION['idfront']);
		## get detail users
		$url = linkservice('account') ."users/details/".$id;
		$method = 'GET';
		$responseApi = admsCurl($url, array('tipePengambilan'=>'dropdownlist'), $method);
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else {
			$dataApiDetail = json_decode($responseApi['response'],true);
		}
		$detailBiodata = @$dataApiDetail['data']['users'];
		
		/* *******************************
			cek kelengkapan data awal
			********************************
		*/
			if ($detailBiodata['Phone'] == '' || 
				$detailBiodata['BankId'] == '' || 
				$detailBiodata['BankAccountNumber'] == '' || 
				$detailBiodata['BankAccountName'] == '' || 
				$detailBiodata['Name'] == '' || 
				$detailBiodata['IdentityNumber'] == '' || 
				$detailBiodata['NpwpNumber'] == '' 
			){

			$data['page'] 	= 'biodata/ForNPL';
			$data['detailBiodata'] = $detailBiodata;
			############################################################
			## get list Bank
			$url = linkservice('master')."bank/get";
			$method = 'GET';
			$responseApi = admsCurl($url, array('tipePengambilan'=>'dropdownlist'), $method);
			if ($responseApi['err']) { 
				echo "<hr>cURL Error #:" . $responseApi['err']; 
			} else {
				$dataApi = json_decode($responseApi['response'],true);
				$listBank = $dataApi['data'];
			}
			$data['listBank'] = @$listBank;
			############################################################
			
			
		} 
		else {
			$data['title']	= 'Pembelian NPL';
			$data['page'] 	= 'counter/pembelian/add';
		}
		
		
		
		
			// echo '<pre>';
			// print_r($data['detailBiodata']);
			// echo '</pre>';
		
		$this->load->view('templateAdminLTE',$data);
	}


	public function otp() {
		// handle KTP
		$urlKTP = linkservice('account')."users/searchKtp?ktp=".$this->input->post('IdentityNumber');
		$methodKTP = 'GET';
		$resKTP = admsCurl($urlKTP, array(), $methodKTP);
		$ktp_data = json_decode($resKTP['response']);
		
		if($ktp_data->status === 1) {
			redirect('beli-npl', 'refresh');
		}
		else {
			$otpsesi = substr(str_shuffle("0123456789"), -5);
			$otpin = array(
				'otpNPL' => $otpsesi
			);
			$this->session->set_userdata( $otpin );

			// cek if phone is set
			if(@$this->input->post('Phone')) {
				$this->session->set_userdata('Phone', $this->input->post('Phone'));
			}

			// jika difrontend pengguna meminta mengirimkan lagi otp nya.
			if (@$this->input->get('otpkirim')=='yes') {
				$_POST['otpkirim'] = 'true';
				$_POST['Phone'] = $this->session->userdata('Phone');
			} else {
				$array = array(
					'BiodataPembelianNPL' => @$_POST
				);
				$this->session->set_userdata( $array );
			}

			// ########### add by mas andi supervisor
			date_default_timezone_set('Asia/Jakarta');
			// send to sms
			$dataInsert =  array (
				'type'			=> 'sms',
				'msisdn'		=> @$_POST['Phone'],
				'message'		=> 'IBID OTP anda : '.$otpsesi,
				'description'	=> 'OTP IBID',
				'schedule'		=> date("d/m/Y H:i",strtotime(date("Y-m-d H:i:s")."+1 Minutes")),
				'campaign'		=> 'OTP'
			);
			$url 			= linkservice('notif')."api/notification";
			$method 		= 'POST';
			$responseApi 	= admsCurl($url, $dataInsert, $method);
			// ########################################

			if ($_POST['otpkirim']=='true') {
				#########
				$dataInsert =  array (
					'type' => 'email',
					'to' => @$this->session->userdata('emailfront'),
					'cc' => 'lutfi.f.hidayat@gmail.com',
					'subject' => 'OTP Pembelian NPL',
					'body' => '
					<p>Kode OTP</p>
					<p><b> '.$otpsesi.'</b></p>
					'
				); 

				$url 			= linkservice('notif')."api/notification";
				$method 		= 'POST';
				$responseApi 	= admsCurl($url, $dataInsert, $method);

				redirect('biodata/otpconfirm', 'refresh');

			} else {
				redirect('pembelian', 'refresh');
			}
		}
	}

	public function otpconfirm()
	{
		// print_r($this->session->all_userdata());


		if (isset($_POST['otp'])) {
			// ubah format data otp dari string menjadi array, karena menggunakan javascript POST datanya
			$otpconv = json_decode($_POST['otp']);

			// cek otp apakah benar
			$hitung = count($otpconv);
			$otp = implode("", $otpconv);  

			if($otp == $this->session->userdata('otpNPL')) {
				echo "cocok";
				exit;
				//redirect('biodata/updateForNPL','refresh');

			} else {
				echo "OTP tidak cocok";
				exit;
				//$this->session->set_flashdata('message', array('error', 'OTP tidak cocok', 'Perhatian'));
				//redirect('biodata/otpconfirm','refresh');
			}
		}

		$data['title']	= 'Pembelian NPL';
		$userdata = $this->session->userdata('userdata');
		$data = array(
			// header white untuk selain home, karena menggunakan header yang berwarna putih
			'header_white'		=> "header-white",
			'userdata'			=> $userdata,
			'title'				=> 'Beli Nomor Peserta Lelang ( NPL )',
			'form_auth_mobile'	=> login_status_form_mobile($userdata),
			'form_auth'			=> login_Status_form($userdata),
			'phone'				=> ''
		);
		
		$view	= 'npl/npl_otp_view';  
		// $view = "npl/npl_view";
		template($view , $data);
	}

	function updateForNPL(){

		// print_r($this->session->all_userdata());
		// exit();


		############################################################
		$id = trim($_SESSION['idfront']);
		// exit();
		## get detail users
		$url = linkservice('account') ."users/details/".$id;
		$method = 'GET';
		$responseApi = admsCurl($url, array('tipePengambilan'=>'dropdownlist'), $method);
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else {
			$dataApiDetail = json_decode($responseApi['response'], true);
		}
		$detailBiodata = @$dataApiDetail['data'];
		
		// print_r($detailBiodata);
		$sesi = $this->session->all_userdata();

		// echo "<pre>";
		// print_r($sesi);
		// exit();
		

		// update users
		$dataPost['dataUpdate'] = array(
			'Name' => @$sesi['BiodataPembelianNPL']['Name'],
			'Phone' => $sesi['BiodataPembelianNPL']['Phone'],
		);
		$dataPost['whereUpdate'] = array(
			'UserId' => $id,
		);
		$url = linkservice('account') ."users/updates";
		$method = 'POST';
		$responseApi = admsCurl($url, $dataPost, $method);

		// exit();

		$usersBiodataArray = array(
			'BiodataId' => $id,
			'IdentityNumber' => $sesi['BiodataPembelianNPL']['IdentityNumber'],
			'NpwpNumber' => @$sesi['BiodataPembelianNPL']['NpwpNumber'],
			'BankId' => @$sesi['BiodataPembelianNPL']['BankId'],
			'BankAccountName' => $sesi['BiodataPembelianNPL']['BankAccountName'],
			'BankAccountNumber' => $sesi['BiodataPembelianNPL']['BankAccountNumber']
		);

			// print_r($usersBiodataArray);
			// exit();


		if ($detailBiodata['users']['BiodataId'] == ''){


			// Insert Biodata
			$url = linkservice('account') .'usersbiodata/add';
			$method = 'POST';
			$responseApi = admsCurl($url, $usersBiodataArray, $method);
			if ($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			} else {
			}

		}
		else {

			// UPDATE Biodata
			$dataPostUsersBiodata['dataUpdate'] = $usersBiodataArray;
			$dataPostUsersBiodata['whereUpdate'] = array('BiodataId' => $id);

			$url = linkservice('account') ."usersbiodata/updates";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataPostUsersBiodata, $method);
			if ($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			} else {
			}
		}

			// print_r($responseApi);
		redirect('pembelian');
		// echo '<pre>';
		// print_r($_POST);
		// print_r($detailBiodata);
		// echo '</pre>';
	}
}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
