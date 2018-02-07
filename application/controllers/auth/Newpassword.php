<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newpassword extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global', 'omni'));
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index() {
		$data['page']				= 'auth/newpassword';
		$data['title']				= 'Password Baru';
		$data['header_white']		= "header-white";
		$data['message']			= $this->session->flashdata('message');
		$data['form_auth_mobile']	= login_status_form_mobile($this->userdata);
		$data['form_auth']			= login_status_form($this->userdata);

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE) {
			$data['email'] = $this->input->get('email');
			$data['changepassword'] = $this->input->get('changepassword');
			template('auth/newpassword', $data);	 
		}
		else {    
			$dataInsert = array(
				'password' => $this->input->post('password'),
				'grant_type' => 'forgot',
				'username' => $this->input->post('email')
			);

			$url =  linkservice('account') ."auth/oauth2";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataInsert, $method);
			
			## redirect dan email(belum)
			if($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			}
			else {
				$responseApiInsert = json_decode($responseApi['response'], true);
				if($responseApiInsert['success'] == 'true') {
					$this->session->set_flashdata('message', array('success', $responseApiInsert['message']));
					redirect('login', 'refresh');
				}
				else if ($responseApiInsert['success'] == 'false') { 
					$this->session->set_flashdata('message', array('warning', $responseApiInsert['message']));
					redirect('newpassword?changepassword='.$this->input->post('changepassword').'&email='.$this->input->post('email'), 'refresh');	
				} 
			} 
		}
	}

}

/* End of file Newpassword.php */
/* Location: ./application/controllers/auth/Newpassword.php */
