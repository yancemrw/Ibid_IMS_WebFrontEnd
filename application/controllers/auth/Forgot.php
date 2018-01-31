<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {


	public function __construct() {
		parent::__construct(); 
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global' , 'omni'));
	}

	public function index()
	{
		// page dibawah ini mengambil tampilan untuk function ini.
		// namafolder / file

		$data['title'] = 'Lupa Password';
		$data['page'] = 'auth/forgot'; 

		$data['message'] = $this->session->flashdata('message'); 
		
		$userdata = $this->session->userdata('userdata');
		$data['form_auth_mobile'] = login_status_form_mobile($userdata);
		$view 					= 'auth/forgot';
		$data['header_white']	= "header-white";
		$data['userdata']		= $userdata;
		$data['form_auth']		= login_Status_form($userdata);

		$this->form_validation->set_rules('email', 'Email', 'required');  

		if ($this->form_validation->run() == FALSE)
		{
			// $this->load->view('auth/templateauthadmin',$data);	 


			template($view, $data);

		}
		else
		{    
			$dataInsert = array(
				'email' => $this->input->post('email')
			);
			
			$url = linkservice('account') ."auth/forgot/";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataInsert, $method);
			
			// print_r($responseApi);
			// exit();

			## redirect dan email(belum)
			if ($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			} else {
				// print_r($responseApi);
				$responseApiInsert = json_decode($responseApi['response'], true);
				if ($responseApiInsert['status'] == 1){

					$this->session->set_flashdata('message', array('success', $responseApiInsert['message']));
					// redirect('role/lists','refresh');

					$responseApiInsert['message'];
					$data = $responseApiInsert['data'][0];

					// echo "<br>";

					// echo $data['link'];
					redirect('auth/login', 'refresh');

				} else if ($responseApiInsert['status'] == 0){ 

					$this->session->set_flashdata('message', array('warning', $responseApiInsert['message']));
					redirect('auth/forgot','refresh');

				}
			} 
		} 

		
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/auth/Login.php */
