<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// echo "frontend";
		redirect('auth/login');
		// admsapi(200 , 1, 'Welcome to Service Front End' , '');
	}

	public function sms()
	{
		$this->load->view('sms');
	}

	public function sms2()
	{
		$this->load->view('sms2');
	}

}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */
