<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global' , 'omni'));
	}
	
	public function index(){
		// page dibawah ini mengambil tampilan untuk function ini.
		// namafolder / file
		$data['title'] = 'Login Admin ADMS';
		$data['page'] = 'auth/login';
		
		$this->session->unset_userdata('OAUTH_ACCESS_TOKEN');
		$this->session->unset_userdata('namefb');
		$this->session->unset_userdata('emailfb');
		$this->session->unset_userdata('tokenfb');
		$this->session->unset_userdata('usernamefb');
		$this->session->unset_userdata('emaillinkedin');
		$this->session->unset_userdata('namelinkedin');
		$this->session->unset_userdata('emailgoogle');
		$this->session->unset_userdata('namegoogle');
		
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[20]');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('auth/templateauthadmin',$data); 
		}
		else{
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$dataLogin = array(
				'email' => $username,
				'password' => $password,
			);
			## send data registrasi
			$url = linkservice('account') ."auth/login/login";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataLogin, $method);
			
			// print_r($responseApi); 
			
			## redirect dan email(belum)
			if ($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			} else {
				$responseApiInsert = json_decode($responseApi['response'], true);
				if ($responseApiInsert['status'] == 1){
					// print_r($responseApiInsert['data']);
					if ($responseApiInsert['data'][0]['groupname'] == 'members' || $responseApiInsert['data'][0]['groupname'] == 'admin'){
						$this->session->set_flashdata('message', '<div class="alert alert-warning">'.$responseApiInsert['message'].'</div>');
						redirect('users/lists','refresh');
					} else{
						redirect('afterlogin','refresh');
					}
				}
				else if ($responseApiInsert['status'] == 0){
					$this->session->set_flashdata('message', '<div class="alert alert-warning">'.$responseApiInsert['message'].'</div>');
					redirect('auth/login');
				}
			}
			
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/auth/Login.php */
