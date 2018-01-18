<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newpassword extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global' , 'omni'));
	}



	public function index()
	{
		// page dibawah ini mengambil tampilan untuk function ini.
		// namafolder / file
		$data['page'] 		= 'auth/newpassword';
		$data['title'] 		= 'Password Baru';
		$data['message'] 	= $this->session->flashdata('message');

		$this->form_validation->set_rules('password', 'Password', 'required');  
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');  

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('auth/templateauthadmin',$data);	 
		}
		else
		{    
			$dataInsert = array(
				'password' => $this->input->post('password'),
				'confirmpassword' => $this->input->post('confirmpassword'),
				'email' => @$this->input->post('email'),
				'tokenforgot' => @$this->input->post('changepassword')
				);
			
			// print_r($dataInsert);
			// exit();

			$url =  linkservice('account') ."auth/forgotprosess/";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataInsert, $method);
			
			## redirect dan email(belum)
			if ($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			} else {
				// print_r($responseApi);
				$responseApiInsert = json_decode($responseApi['response'], true);

				// print_r($responseApiInsert);
				if ($responseApiInsert['status'] == 1){

					$this->session->set_flashdata('message', '<div class="alert alert-success">'.$responseApiInsert['message'].'</div>');
					// redirect('role/lists','refresh'); 

					echo $responseApiInsert['message'];

					echo anchor('auth/login', 'Login Disini', '');

				} else if ($responseApiInsert['status'] == 0){ 

					$this->session->set_flashdata('message', '<div class="alert alert-warning">'.$responseApiInsert['message'].'</div>');
					// redirect('auth/newpassword','refresh');
					$this->load->view('auth/template',$data);	

				} 
			} 
		}



	}

}

/* End of file Newpassword.php */
/* Location: ./application/controllers/auth/Newpassword.php */
