<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global' , 'omni'));
		$this->AccessApi = new AccessApi(array_merge($this->config->item('Oauth'),array('username' => 'rendhy.wijayanto@sera.astra.co.id')));
		if(@$this->session->userdata('userdata')) {
			redirect();
		}
	}
	
	public function index() {
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
		$userdata = $this->session->userdata('userdata');
		if(@$this->input->get('status')) {
			$data = array(
				'header_white'	=> "header-white",
				'userdata'		=> $this->session->userdata('userdata'),
				'title'			=> 'Login',
				'form_auth_mobile' => login_status_form_mobile($userdata),
				'form_auth'		=> login_Status_form($userdata)
			);
			$view = "auth/login";
			template($view, $data);
		}
		else if($this->form_validation->run() == FALSE) {
			//$this->load->view('auth/templateauthadmin',$data);
			$data = array(
				'header_white'	=> "header-white",
				'userdata'		=> $this->session->userdata('userdata'),
				'title'			=> 'Login',
				'form_auth_mobile' => login_status_form_mobile($userdata),
				'form_auth'		=> login_Status_form($userdata)
			);
			$view = "auth/login";
			template($view, $data);
		}
		else {
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			// login by ouath2
			$dataLogin = array(
				'grant_type'	=> 'password',
				'client_id'		=> 'ADMS Web',
				'client_secret'	=> '1234567890',
				'action'		=> '',
				'redirect_url'	=> base_url(),
				'username'     	=> $username,
				'password'      => $password,
				'ipAddress'		=> $this->input->ip_address()
			);
			$url = linkservice('account')."auth/oauth2";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataLogin, $method);
			## redirect dan email(belum)
			if($responseApi['err']) {
				echo "<hr>cURL Error #:".$responseApi['err'];
			}
			else {
				// response from oauth2
				$res = json_decode($responseApi['response']);
				if(isset($res->error)) {
					$callback = new stdClass();
					$callback->status = 0;
					$callback->messages = $res->error_description;
					echo json_encode($callback);
					//$this->session->set_flashdata('message', array('warning', $res->error_description));
					//redirect('login');
				}
				else {
					// set token on session
					$this->session->set_userdata('idfront', $res->UserId);
					$this->session->set_userdata('namefront', $res->Name);
					$this->session->set_userdata('emailfront', $res->username);
					$this->session->set_userdata('groupnamefront', $res->GroupName);
					$this->AccessApi->setAccess('in',(array)$res);

					$callback = new stdClass();
					$callback->status = 1;
					$callback->messages = 'Berhasil Login';
					echo json_encode($callback);
					//$this->session->set_flashdata('message', array('success', 'Berhasil Login'));
					//redirect(site_url());
				} 
			}
			
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/auth/Login.php */
