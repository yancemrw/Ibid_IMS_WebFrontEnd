<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global' , 'omni'));
	}

	public function index() {

		$dataInsert =  array (
			'email' => @$this->input->get('email')
		); 

		$url 			= linkservice('account') ."auth/Emailverifikasi";
		$method 		= 'POST';
		$responseApi 	= admsCurl($url, $dataInsert, $method);
		
		if($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			}
			else {
				$responseApiInsert = json_decode($responseApi['response'], true);
				if ($responseApiInsert['status'] == 1){
					$this->session->set_flashdata('message', array('success', 'Akun anda berhasil di aktivasi'));
					redirect('auth/login', 'refresh');
				}
				else if ($responseApiInsert['status'] == 0) {
					echo $responseApiInsert['message']; 
				}
			}  
	}

}

/* End of file Verify.php */
/* Location: ./application/controllers/auth/Verify.php */
