<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Afterlogin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global' , 'omni'));
		$this->AccessApi = new AccessApi(array('client_id' => 'ADMS Web', 'client_secret' => '1234567890', 'username' => $this->session->userdata('userdata')['username']));
		$this->AccessApi->redirect_url = base_url('index.php/auth/loginCustomer');
		print_r($this->AccessApi); die();
		$this->AccessApi->check_login();
	}

	public function index()
	{
		// echo "<center>";	
		// echo "<h1>";	
		// echo $this->session->flashdata('pesan');
		// echo "</h1>";
		// echo "<br>";
		// echo "<br>";
		// echo "Haloo ......    ";
		// echo @$this->session->userdata('namefb');
		// echo @$this->session->userdata('namegoogle');
		// echo @$this->session->userdata('namelinkedin');
		// echo "<br>";
		// echo @$this->session->userdata('emailfb');
		// echo @$this->session->userdata('emailgoogle');
		// echo @$this->session->userdata('emaillinkedin');

		// echo "Kamu sudah berhasil login";
		// echo "<hr>";
		// echo "<a href='".site_url()."'>Logout</a>";
		// echo "</center>";	
		$this->load->view('homeCustomer');
	}

}

/* End of file Afterlogin.php */
/* Location: ./application/controllers/Afterlogin.php */
