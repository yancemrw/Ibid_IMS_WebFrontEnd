<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}
	
	public function index() {
		$data['title']	= 'Register Customer';
		$data['page'] = 'auth/register';

		// penambahan lutfi
		$data['linkfacebook'] = facebook();
		$data['linkgoogle'] = google();
		$data = array(
			'header_white'		=> "header-white",
			'userdata'			=> $this->session->userdata('userdata'),
			'title'				=> 'Pendaftaran',
			'form_auth_mobile'	=> login_status_form_mobile($this->userdata),
			'form_auth'			=> login_Status_form($this->userdata)
		);
		$view = "auth/register";
		template($view, $data);		
	}

	public function create_user() {
		$callback = new stdClass();
		$dataInsert = array(
			'username'		=> $this->input->post('email'),
			'email'			=> $this->input->post('email'),
			'first_name'	=> $this->input->post('name'),
			'password'		=> $this->input->post('pass')
		);

		// cek email first, if exists cannot register
		$urls = linkservice('account')."auth/checkemail";
		$meth = 'POST';
		$resp = admsCurl($urls, $dataInsert, $meth);
		$jsondec = json_decode($resp['response']);
		if($jsondec->status === 0) {
			$url = linkservice('account')."auth/registerfrontend/register";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataInsert, $method);

			if($responseApi['err']) {
				$callback->status = 0;
				$callback->messages = $responseApi['err'];
				$callback->redirect = '';
				echo json_encode($callback);
				exit;
			}
			else {
				$callback->status = 1;
				$callback->messages = 'Akun berhasil didaftarkan, mohon lakukan verifikasi email';
				$callback->redirect = 'login';
				echo json_encode($callback);
				exit;
			}
		}
		else {
			$callback->status = 0;
			$callback->messages = 'Email sudah terdaftar';
			$callback->redirect = 'register';
			echo json_encode($callback);
			exit;
		}
	}
	
}

/* End of file Login.php */
/* Location: ./application/controllers/auth/Login.php */
