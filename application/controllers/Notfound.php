<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		show_404();
	}

}

/* End of file Notfound.php */
/* Location: ./application/controllers/Notfound.php */