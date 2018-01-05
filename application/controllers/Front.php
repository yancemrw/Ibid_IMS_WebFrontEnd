<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function index()
	{
		$data = array();
		$this->load->view('template/front', $data, FALSE);		
	}

}

/* End of file Front.php */
/* Location: ./application/controllers/Front.php */
