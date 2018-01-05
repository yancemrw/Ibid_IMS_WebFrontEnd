<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global' , 'omni','template'));
		$this->AccessApi = new AccessApi(array_merge($this->config->item('Oauth'),array('username' => 'rendhy.wijayanto@sera.astra.co.id')));
	}

	public function index()
	{
		$data = array();

		## hapus session by sosmed yang balik lagi 
		if (@$this->input->get('clear')) {
			$this->session->unset_userdata('OAUTH_ACCESS_TOKEN');
			$this->session->unset_userdata('namefb');
			$this->session->unset_userdata('emailfb');
			$this->session->unset_userdata('tokenfb');
			$this->session->unset_userdata('usernamefb');
			$this->session->unset_userdata('emaillinkedin');
			$this->session->unset_userdata('namelinkedin');
			$this->session->unset_userdata('emailgoogle');
			$this->session->unset_userdata('namegoogle');

			$this->session->unset_userdata('namatwitter');
			$this->session->unset_userdata('usernametwitter');
			$this->session->unset_userdata('emailtwitter');
		}
		## end
		$view = "template/front";
		template($view , $data);	
	}

}

/* End of file Front.php */
/* Location: ./application/controllers/Front.php */
