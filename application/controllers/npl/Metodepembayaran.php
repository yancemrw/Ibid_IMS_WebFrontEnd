<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metodepembayaran extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper(array('global', 'omni'));
        $this->AccessApi = new AccessApi(array('client_id' => 'ADMS Web', 'client_secret' => '1234567890', 'username' => 'rendhy.wijayanto@sera.astra.co.id'));
		$this->AccessApi->redirect_url = site_url('login');
		$this->AccessApi->check_login();
		$this->userdata = $this->session->userdata('userdata');
    }

	public function index() {
		$data = array(
			// header white untuk selain home, karena menggunakan header yang berwarna putih
			'header_white'		=> "header-white",
			'userdata'			=> $this->userdata,
			'title'				=> 'Beli Nomor Peserta Lelang ( NPL )',
			'form_auth_mobile'	=> login_status_form_mobile($this->userdata),
			'form_auth'			=> login_Status_form($this->userdata)
		);
		template('npl/metodepembayaran', $data);
	}

}

/* End of file Metodepembayaran.php */
/* Location: ./application/controllers/npl/Metodepembayaran.php */