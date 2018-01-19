<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global' , 'omni'));
		$this->AccessApi = new AccessApi(array('client_id' => 'ADMS Web', 'client_secret' => '1234567890', 'username' => 'rendhy.wijayanto@sera.astra.co.id'));
		$this->AccessApi->redirect_url = base_url('auth/login');
		$this->AccessApi->check_login();
	}

	public function index() {
		$this->form_validation->set_rules('upd_name', 'Nama', 'required');
		$this->form_validation->set_rules('upd_phone', 'No Telepon', 'required');
		$this->form_validation->set_rules('dob', 'Tanggal Lahir', 'required');

		if($this->form_validation->run() === FALSE) {

			$userdata = $this->session->userdata('userdata');
			$url = linkservice('account')."users/details/".$userdata['UserId'];
			$method = 'GET';
			$responseApi = admsCurl($url, array(), $method);
			$generate = curlGenerate($responseApi);

			$url = linkservice('master')."bank/get";
			$method = 'GET';
			$responseApi = admsCurl($url, array('tipePengambilan'=>'dropdownlist'), $method);
			$listBank = curlGenerate($responseApi);

			$userdata = $this->session->userdata('userdata');
			$data = array(
				'header_white'	=> "header-white",
				'userdata'		=> $userdata,
				'title'			=> 'Data Diri',
				'form_auth'		=> login_Status_form($userdata),
				'content'		=> $generate,
				'listBank'		=> @$listBank
			);
			$data['img_link'] = 'https://instagram.fjkt1-1.fna.fbcdn.net/t51.2885-15/e35/25023178_125021498293801_6299328116707819520_n.jpg';
			$view = "akun/dasbor_view";
			template($view, $data);

		}
		else {

			$dataUpdate = array(
				'UserId'			=> $this->input->post('UserId'),
				'name'				=> $this->input->post('upd_name'),
				'email'				=> $this->input->post('upd_email'),
				'phone'				=> $this->input->post('upd_phone'),
				'memberid'			=> $this->input->post('idcard'),
				'Gender'			=> $this->input->post('gender'),
				'dob'				=> $this->input->post('dob'),
				'city'				=> $this->input->post('city'),
				'address'			=> $this->input->post('address'),
				'nonpwp' 			=> $this->input->post('npwp'),
				'noktp'				=> $this->input->post('ktp'),
				'address' 			=> $this->input->post('address'),
				'city' 				=> $this->input->post('city'),
				'bankid' 			=> $this->input->post('bankid'),
				'accountnumber'		=> $this->input->post('norek'),
				'accountname'		=> $this->input->post('rekname')
			);

			$url = linkservice('account')."userfrontend/Edit";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataUpdate, $method);

			if($responseApi['err']) {
				echo "<hr>cURL Error #:".$responseApi['err'];
			}
			else {
				redirect('akun/Dasbor'); 
			}

		}
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/akun/Dasbor.php */
