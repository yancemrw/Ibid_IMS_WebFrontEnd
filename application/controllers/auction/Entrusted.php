<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrusted extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global', 'omni'));
		$this->AccessApi = new AccessApi(array('client_id' => 'ADMS Web', 'client_secret' => '1234567890', 'username' => 'rendhy.wijayanto@sera.astra.co.id'));
		$this->AccessApi->redirect_url = site_url('auth/login');
		$this->AccessApi->check_login();
		$this->userdata = $this->session->userdata('userdata');
	}

	public function index($not_comming = '') {
		if($not_comming === '') {
			redirect('comingsoon', 'refresh');
		}
		else {
			$data = array(
				'header_white'	=> "header-white",
				'userdata'		=> $this->userdata,
				'title'			=> 'Titip Lelang',
				'form_auth_mobile' => login_status_form_mobile($this->userdata),
				'form_auth'		=> login_Status_form($this->userdata)
			);
			$view = "auction/entrusted";
			template($view, $data);
		}
	}

}

/* End of file Entrusted.php */
/* Location: ./application/controllers/auction/Entrusted.php */