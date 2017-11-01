<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callback extends CI_Controller {

	public function index()
	{
		$this->load->library('googleplus');
		/*
		* ini adalah callback dari oauth facebook. 
		* jika digunakan di front end harus ada treathment khusus.
		*/ 
		if (isset($_GET['code'])) {
			// http://localhost:8888/ibiddevelopment/ibiddevapi/ibidadmsuser/index.php/omni/google/callback?code=4/iuwDY-oakWyJ46Kw4f1GTAlaXLoTzwmuS1_QwJAOJVo#
			$this->googleplus->getAuthenticate();  
			// print_r($this->googleplus->getUserInfo());
			$data = $this->googleplus->getUserInfo(); 


			$array = array(
				'emailgoogle' 	=> @$data['email'],
				'namegoogle' 	=> @$data['name'],
			);
			
			$this->session->set_userdata( $array );


			redirect('afterlogin','refresh');

		} else {
			//mengembalikan ke auth register
			redirect('auth/register','refresh');
			// redirect('afterlogin','refresh');
		}
		
	}

}

/* End of file Callback.php */
/* Location: ./application/controllers/omni/google/Callback.php */
