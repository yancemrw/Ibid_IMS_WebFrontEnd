<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// echo "frontend";
		redirect('auth/loginCustomer');
		// admsapi(200 , 1, 'Welcome to Service Front End' , '');
	}

}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */
