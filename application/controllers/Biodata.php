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
		$id = trim($_SESSION['userdata']['UserId']);
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
		) {
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
		
		$this->load->view('templateAdminLTE',$data);
	}


	public function otp() {
		// handle KTP
		$urlKTP		= linkservice('account')."users/searchKtp?ktp=".$this->input->post('IdentityNumber')."&id=".$this->session->userdata('userdata')['UserId'];
		$methodKTP	= 'GET';
		$resKTP		= admsCurl($urlKTP, array(), $methodKTP);
		$ktp_data	= json_decode($resKTP['response']);
		$callback	= new stdClass();
		
		if($ktp_data->status === 1) {
			$callback->status = 0;
			$callback->messages = 'Nomor KTP Anda sudah terdaftar di sistem kami';
			$callback->redirect = 'ktp';
			echo json_encode($callback);
			exit;
			//redirect('beli-npl', 'refresh');
		}
		else {
			$otpsesi = substr(str_shuffle("0123456789"), -5);
			$otpin = array(
				'otpNPL' => $otpsesi
			);
			$this->session->set_userdata($otpin);

			// cek if phone is set false
			if(@$this->input->post('Phone')) {
				$this->session->set_userdata('Phone', $this->input->post('Phone'));
			}

			// jika difrontend pengguna meminta mengirimkan lagi otp nya.
			$resend = false;
			if(@$this->input->get('otpkirim') == 'yes') {
				$resend = true;
				$_POST['otpkirim'] = 'true';
				$_POST['Phone'] = $this->session->userdata('Phone');
			}
			else {
				$array = array(
					'BiodataPembelianNPL' => @$_POST
				);
				$this->session->set_userdata($array);
			}

			if($_POST['otpkirim'] == 'true') {
				######## add by mas Andi Supervisor (send OTP via SMS) ########
				date_default_timezone_set('Asia/Jakarta');
				$dataInsert =  array (
					'type'			=> 'sms',
					'msisdn'		=> @$_POST['Phone'],
					'message'		=> $otpsesi.' adalah kode OTP Anda. Selamat berpartisipasi dalam lelang IBID!',
					'description'	=> 'OTP IBID',
					'schedule'		=> '',
					'campaign'		=> 'OTP'
				);
				$url 			= linkservice('notif')."api/notification";
				$method 		= 'POST';
				$responseApi 	= admsCurl($url, $dataInsert, $method);
				###############################################################

				############### Email OTP (by Juragan Server Lutfi) ################
				/*$dataInsert =  array (
					'type'		=> 'email',
					'to'		=> @$this->session->userdata('emailfront'),
					'cc'		=> 'lutfi.f.hidayat@gmail.com',
					'subject'	=> 'OTP Pembelian NPL',
					'body'		=> '<p>Kode OTP Anda</p><p><b> '.$otpsesi.'</b></p>'
				);
				$url 			= linkservice('notif')."api/notification";
				$method 		= 'POST';
				$responseApi 	= admsCurl($url, $dataInsert, $method);*/
				####################################################################

				if($resend === true) {
					$callback->status = 1;
					$callback->messages = 'OTP sudah kami kirim kembali, silahkan verifikasi';
					$callback->redirect = '';
					echo json_encode($callback);
					exit;
				}
				else {
					$callback->status = 1;
					$callback->messages = 'Data sudah tersimpan, mohon lakukan verifikasi OTP';
					$callback->redirect = 'biodata/otpconfirm';
					echo json_encode($callback);
					exit;
					//redirect('biodata/otpconfirm', 'refresh');
				}
			}
			else {
				$callback->status = 0;
				$callback->messages = 'Data anda sudah terdaftar di sistem kami';
				$callback->redirect = 'pembelian';
				echo json_encode($callback);
				exit;
				//redirect('pembelian', 'refresh');
			}
		}
	}

	public function otpconfirm() {
		if (isset($_POST['otp'])) {
			// ubah format data otp dari string menjadi array, karena menggunakan javascript POST datanya
			$otpconv = json_decode($_POST['otp']);

			// cek otp apakah benar
			$hitung = count($otpconv);
			$otp = implode("", $otpconv);  

			if($otp == $this->session->userdata('otpNPL')) {
				echo "cocok";
				exit;

			} else {
				echo "OTP tidak cocok";
				exit;
			}
		}

		$data['title']	= 'Pembelian NPL';
		$userdata = $this->session->userdata('userdata');
		$data = array (
			// header white untuk selain home, karena menggunakan header yang berwarna putih
			'header_white'		=> "header-white",
			'userdata'			=> $userdata,
			'title'				=> 'Beli Nomor Peserta Lelang ( NPL )',
			'form_auth_mobile'	=> login_status_form_mobile($userdata),
			'form_auth'			=> login_Status_form($userdata),
			'phone'				=> (@$this->session->userdata('Phone')) ? $this->session->userdata('Phone') : ''
		);
		$view	= 'npl/npl_otp_view';  
		template($view , $data);
	}

	function updateForNPL() {
		$id = trim($_SESSION['userdata']['UserId']);

		## get detail users
		$url = linkservice('account') ."users/details/".$id;
		$method = 'GET';
		$responseApi = admsCurl($url, array('tipePengambilan'=>'dropdownlist'), $method);
		if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else {
			$dataApiDetail = json_decode($responseApi['response'], true);
		}
		$detailBiodata = @$dataApiDetail['data'];
		$sesi = $this->session->all_userdata();

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

		// session user biodata
		$usersBiodataArray = array (
			'BiodataId' => $id,
			'IdentityNumber' => $sesi['BiodataPembelianNPL']['IdentityNumber'],
			'NpwpNumber' => @$sesi['BiodataPembelianNPL']['NpwpNumber'],
			'BankId' => @$sesi['BiodataPembelianNPL']['BankId'],
			'BankAccountName' => $sesi['BiodataPembelianNPL']['BankAccountName'],
			'BankAccountNumber' => $sesi['BiodataPembelianNPL']['BankAccountNumber']
		);

		if($detailBiodata['users']['BiodataId'] == '') {
			$url = linkservice('account').'usersbiodata/add';
			$method = 'POST';
			$responseApi = admsCurl($url, $usersBiodataArray, $method);
			if($responseApi['err']) {
				echo "<hr>cURL Error #:".$responseApi['err'];
			}
		}
		else {
			// UPDATE Biodata
			$dataPostUsersBiodata['dataUpdate'] = $usersBiodataArray;
			$dataPostUsersBiodata['whereUpdate'] = array('BiodataId' => $id);
			$url = linkservice('account')."usersbiodata/updates";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataPostUsersBiodata, $method);
			if($responseApi['err']) {
				echo "<hr>cURL Error #:".$responseApi['err'];
			}
		}

		// jika update biodata dari dashboard
		if($sesi['BiodataPembelianNPL']['otpsource'] === 'dashboard') {
			$usersBiodataData = array (
				'BankBranch' => $sesi['BiodataPembelianNPL']['branchbank'],
				'Gender' => $sesi['BiodataPembelianNPL']['gender'],
				'Birthdate' => (@$sesi['BiodataPembelianNPL']['dob']) ? $sesi['BiodataPembelianNPL']['dob'] : NULL,
				'Address' => $sesi['BiodataPembelianNPL']['address'],
				'City' => $sesi['BiodataPembelianNPL']['city'],
				'Occupation' => $sesi['BiodataPembelianNPL']['okup']
			);

			$userData = array (
				'first_name' => $sesi['BiodataPembelianNPL']['first_name'],
				'last_name' => $sesi['BiodataPembelianNPL']['last_name'],
				'Email' => @$sesi['BiodataPembelianNPL']['upd_email'],
				'Phone' => $sesi['BiodataPembelianNPL']['Phone'],
				'MemberCardTMP' => $sesi['BiodataPembelianNPL']['idcard'],
			);

			$dataPostUser['dataUpdate'] = $userData;
			$dataPostUser['whereUpdate'] = array('UserId' => $id);
			$urlUser = linkservice('account')."users/updates";
			$methodUser = 'POST';
			$resApiUser = admsCurl($urlUser, $dataPostUser, $methodUser);
			if($resApiUser['err']) {
				echo "<hr>cURL Error #:".$resApiUser['err'];
			}

			$dataPostUserBiodata['dataUpdate'] = $usersBiodataData;
			$dataPostUserBiodata['whereUpdate'] = array('BiodataId' => $id);
			$urlBiodata = linkservice('account')."usersbiodata/updates";
			$methodBiodata = 'POST';
			$resApiBiodata = admsCurl($urlBiodata, $dataPostUserBiodata, $methodBiodata);
			if($resApiBiodata['err']) {
				echo "<hr>cURL Error #:".$resApiBiodata['err'];
			}
			redirect('dashboard');
		}
		else if($sesi['BiodataPembelianNPL']['otpsource'] === 'npl') {
			redirect('pembelian');
		}
	}
}

/* End of file Lists.php */
/* Location: ./application/controllers/item/Lists.php */
