<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global' , 'omni'));
	}
	
	public function index(){ 

		if (empty($this->session->userdata('emailgoogle'))) { redirect('auth/register','refresh'); }

		$data['page'] = 'omni/registergoogle';
		$data['message'] = $this->session->userdata('message');
		// penambahan lutfi 
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('repassword', 'RePassword', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if ($this->form_validation->run() == FALSE){
			// engine template
			$this->load->view('auth/template',$data);
		}
		else{
			// post 
			$name = $_POST['name'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			$dataInsert = array(
				'name' 		=> $name,
				'username' 	=> $username,
				'password' 	=> $password,
				'email' 	=> $email,
				'tipe' 		=> 'customer',
				'sendmail' 	=> TRUE,
				);
			// logic response api
			$url = linkservice('account') ."auth/register/register";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataInsert, $method);
			// print_r($responseApi);

			if ($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			} else {

				$responseApiInsert = json_decode($responseApi['response'], true);
				if ($responseApiInsert['status'] == 1){

					$this->session->set_flashdata('message', '<div class="alert alert-success">'.$responseApiInsert['message'].'</div>');
					// redirect('role/lists','refresh');
					echo $responseApiInsert['message'];
					echo "silahkan login"; 

					// un set session dari registrasi berhasil
					$this->session->unset_userdata('emailgoogle');
					$this->session->unset_userdata('namegoogle');

					print_r($this->session->all_userdata());


				} else if ($responseApiInsert['status'] == 0){ 

					$this->session->set_flashdata('message', '<div class="alert alert-warning">'.$responseApiInsert['message'].'</div>');
					// echo $responseApiInsert['message'];
					redirect('omni/google/register','refresh');
					// redirect('role/lists','refresh');

				} 
				
			}

		}
		
	}
	
}

/* End of file Login.php */
/* Location: ./application/controllers/auth/Login.php */
