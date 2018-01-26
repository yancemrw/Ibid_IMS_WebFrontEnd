<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global', 'omni'));
		$this->AccessApi = new AccessApi(array('client_id' => 'ADMS Web', 'client_secret' => '1234567890', 'username' => 'rendhy.wijayanto@sera.astra.co.id'));
		$this->AccessApi->redirect_url = site_url('auth/login');
		$this->AccessApi->check_login();
	}

	public function index() {
		$this->form_validation->set_rules('first_name', 'Nama Depan', 'required');
		$this->form_validation->set_rules('noktp', 'No KTP', 'required');
		$this->form_validation->set_rules('phone', 'No Telepon', 'required');
		$this->form_validation->set_rules('bankid', 'BANK', 'required');
		$this->form_validation->set_rules('accountnumber', 'No Rekening', 'required');
		$this->form_validation->set_rules('accountname', 'Nama Rekening', 'required');

		if($this->form_validation->run() === FALSE) {

			$userdata = $this->session->userdata('userdata');
			$url = linkservice('account')."users/details/".$userdata['UserId'];
			$method = 'GET';
			$responseApi = admsCurl($url, array(), $method);
			$generate = curlGenerate($responseApi);

			// ubah date format
			$split = explode('-', $generate->users->Birthdate);
			$generate->users->Birthdate = @$generate->users->Birthdate != "" ? (@$split[2].'/'.@$split[1].'/'.@$split[0]) : '';

			$url = linkservice('master')."bank/get";
			$method = 'GET';
			$responseApi = admsCurl($url, array('tipePengambilan'=>'dropdownlist'), $method);
			$listBank = curlGenerate($responseApi);

			$userdata = $this->session->userdata('userdata');
			$data = array(
				'header_white'	=> "header-white",
				'userdata'		=> $userdata,
				'title'			=> 'Data Diri',
				'form_auth_mobile' => login_status_form_mobile($userdata),
				'form_auth'		=> login_Status_form($userdata),
				'content'		=> $generate,
				'listBank'		=> @$listBank
			);
			//$data['img_link'] = 'https://instagram.fjkt1-1.fna.fbcdn.net/t51.2885-15/e35/25023178_125021498293801_6299328116707819520_n.jpg';
			$data['img_link'] = base_url('assetsfront/images/icon/ic_avatar.png');
			$view = "akun/dasbor_view";
			if(isset($_POST)){
				echo "<pre>"; print_r($_POST); die();
			}
			template($view, $data);

		}
		else {
			$tmpDob = !empty($this->input->post('dob'))?explode("/", $this->input->post('dob')):false;
			$dataUpdate = array(
				'UserId'			=> $this->input->post('UserId'),
				'first_name'		=> $this->input->post('first_name'),
				'last_name'			=> $this->input->post('last_name'),
				'email'				=> $this->input->post('upd_email'),
				'phone'				=> $this->input->post('upd_phone'),
				'memberid'			=> $this->input->post('idcard'),
				'gender'			=> ($this->input->post('gender') !== "") ? $this->input->post('gender') : NULL,
				'dob'				=> $tmpDob?(sprintf("%04d",$tmpDob[2])."-".sprintf("%02d",$tmpDob[1])."-".sprintf("%02d",$tmpDob[0])):NULL,
				'city'				=> $this->input->post('city'),
				'address'			=> $this->input->post('address'),
				'occupation'		=> $this->input->post('okup'),
				'nonpwp' 			=> $this->input->post('npwp'),
				'noktp'				=> $this->input->post('ktp'),
				'address' 			=> $this->input->post('address'),
				'city' 				=> $this->input->post('city'),
				'bankid' 			=> $this->input->post('bankid'),
				'accountnumber'		=> $this->input->post('norek'),
				'accountname'		=> $this->input->post('rekname')
			);
echo "<pre>"; print_r($dataUpdate); die();
			$url = linkservice('account')."userfrontend/Edit";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataUpdate, $method);

			if($responseApi['err']) {
				echo "<hr>cURL Error #:".$responseApi['err'];
			}
			else {
				$this->session->set_flashdata('message', array('success', 'Akun Sudah Berhasil Diubah', 'Sukses'));
				redirect('akun/Dasbor'); 
			}
		}
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/akun/Dasbor.php */
