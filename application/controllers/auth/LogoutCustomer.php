<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogoutCustomer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global' , 'omni'));
		$this->AccessApi = new AccessApi(array('client_id' => 'ADMS Web', 'client_secret' => '1234567890', 'username' => 'rendhy.wijayanto@sera.astra.co.id'));
		$this->AccessApi->redirect_url = base_url('index.php/auth/login');
		$this->AccessApi->check_login();
	}

	public function index(){
		if($this->AccessApi->setAccess('out')){
			redirect(base_url(), 'refresh');
		} else{
			echo "<script>window.history.back(-1);</script>";
		}
	}

}

/* End of file LogouCustomer.php */
/* Location: ./application/controllers/auth/LogoutCustomer.php */
