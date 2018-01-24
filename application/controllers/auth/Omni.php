<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Omni extends CI_Controller {

	public function index()
	{
		// page dibawah ini mengambil tampilan untuk function ini.
		// namafolder / file
		$data['page'] 	= 'auth/omni';
		$data['title'] 	= 'Register';
		$data['form_auth_mobile'] => login_status_form_mobile($userdata);
		$data['form_auth'] => login_status_form($userdata);
		$this->load->view('auth/template',$data); 

		
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/auth/Login.php */