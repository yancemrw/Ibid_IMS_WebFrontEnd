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

		$userdata = $this->session->userdata('userdata');
		$url = linkservice('account')."users/details/".$userdata['UserId'];
		$method = 'GET';
		$responseApi = admsCurl($url, array(), $method);
		$generate = curlGenerate($responseApi);

		$userdata = $this->session->userdata('userdata');
		$data = array(
			'header_white'	=> "header-white",
			'form_auth'		=> login_Status_form($userdata),
			'userdata'		=> $userdata,
			'content'		=> $generate
		);
		$data['img_link'] = 'https://instagram.fjkt1-1.fna.fbcdn.net/t51.2885-15/e35/25023178_125021498293801_6299328116707819520_n.jpg';
		$view = "akun/dasbor_view";
		template($view , $data);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/akun/Dasbor.php */
