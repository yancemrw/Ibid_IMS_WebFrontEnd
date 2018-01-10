<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global' , 'omni','template'));
		$this->AccessApi = new AccessApi(array_merge($this->config->item('Oauth'),array('username' => 'rendhy.wijayanto@sera.astra.co.id')));
	}

	public function index()
	{
		$data = array();

		## hapus session by sosmed yang balik lagi 
		if (@$this->input->get('clear')) {
			$this->session->unset_userdata('OAUTH_ACCESS_TOKEN');
			$this->session->unset_userdata('namefb');
			$this->session->unset_userdata('emailfb');
			$this->session->unset_userdata('tokenfb');
			$this->session->unset_userdata('usernamefb');
			$this->session->unset_userdata('emaillinkedin');
			$this->session->unset_userdata('namelinkedin');
			$this->session->unset_userdata('emailgoogle');
			$this->session->unset_userdata('namegoogle');

			$this->session->unset_userdata('namatwitter');
			$this->session->unset_userdata('usernametwitter');
			$this->session->unset_userdata('emailtwitter');
		}
		## end 

		$data = array(
			'title'	=> 'IBID - Balai Lelang Serasi '
		);


		$view = "template/front";
		template($view , $data);


		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[20]');

		if ($this->form_validation->run() == FALSE){
			// $this->load->view('auth/templateauthadmin',$data); 
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
			$url = linkservice('account') ."auth/oauth2";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataLogin, $method);
			## redirect dan email(belum)
			if ($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			} else {
				// response from oauth2
				$res = json_decode($responseApi['response']);
				if(isset($res->error)){
					// kalo gagal
					$this->session->set_flashdata('message', array('error' , '' , 'Gagal'));
					redirect();
				} else {
					// set token on session
					$this->session->set_userdata('idfront', $res->UserId);
					$this->session->set_userdata('namefront', $res->Name);
					$this->session->set_userdata('emailfront', $res->username);
					$this->session->set_userdata('groupnamefront', $res->GroupName);
					$this->AccessApi->setAccess('in',(array)$res);

					// kalo berhasil
					$this->session->set_flashdata('message', array('success' , 'Berhasil Login' , 'Sukses'));
					redirect();
				} 
			}
			
		}
	}

}

/* End of file Front.php */
/* Location: ./application/controllers/Front.php */
