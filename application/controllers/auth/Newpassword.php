<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newpassword extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index()
	{
		$data['page']				= 'auth/newpassword';
		$data['title']				= 'Password Baru';
		$data['header_white']		= "header-white";
		$data['message']			= $this->session->flashdata('message');
		$data['form_auth_mobile']	= login_status_form_mobile($this->userdata);
		$data['form_auth']			= login_status_form($this->userdata);

		$this->form_validation->set_rules('password', 'Password', 'required');  
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');  

		if($this->form_validation->run() == FALSE) {
			template('auth/newpassword', $data);	 
		}
		else {    
			$dataInsert = array(
				'password' => $this->input->post('password'),
				'confirmpassword' => $this->input->post('confirmpassword'),
				'email' => @$this->input->post('email'),
				'tokenforgot' => @$this->input->post('changepassword')
			);

			$url =  linkservice('account') ."auth/forgotprosess/";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataInsert, $method);
			
			## redirect dan email(belum)
			if ($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			}
			else {
				$responseApiInsert = json_decode($responseApi['response'], true);
				if ($responseApiInsert['status'] == 1) {
					$this->session->set_flashdata('message', array('success', $responseApiInsert['message']));
					echo $responseApiInsert['message'];
					echo anchor('auth/login', 'Login Disini', '');
				}
				else if ($responseApiInsert['status'] == 0) { 
					$this->session->set_flashdata('message', array('warning', $responseApiInsert['message']));
					$this->load->view('auth/template',$data);	
				} 
			} 
		}



	}

}

/* End of file Newpassword.php */
/* Location: ./application/controllers/auth/Newpassword.php */
