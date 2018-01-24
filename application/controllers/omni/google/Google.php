<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google extends CI_Controller {

	public function index()
	{
		 $this->load->helper('omni');
		 echo google();
	} 

}

/* End of file Google.php */
/* Location: ./application/controllers/omni/Google.php */