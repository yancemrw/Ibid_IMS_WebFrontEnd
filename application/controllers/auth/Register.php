<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global' , 'omni'));
	}
	
	public function index(){

		// membersihkan token session dari facebook
		// penambahan by lutfi
		$this->session->unset_userdata('OAUTH_ACCESS_TOKEN');
		$this->session->unset_userdata('namefb');
		$this->session->unset_userdata('emailfb');
		$this->session->unset_userdata('tokenfb');
		$this->session->unset_userdata('usernamefb');
		$this->session->unset_userdata('emaillinkedin');
		$this->session->unset_userdata('namelinkedin');
		$this->session->unset_userdata('emailgoogle');
		$this->session->unset_userdata('namegoogle');
		// end

		$data['title']	= 'Register Customer';
		$data['page'] = 'auth/register';
		// penambahan lutfi
		$data['linkfacebook'] = facebook();
		$data['linkgoogle'] = google();

		// end penambahan link 
		
		$this->form_validation->set_rules('first_name', 'first_name', 'required');
		$this->form_validation->set_rules('last_name', 'last_name', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('repassword', 'RePassword', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if ($this->form_validation->run() == FALSE){
			// if ($_SERVER['REQUEST_METHOD'] == 'POST')
				// $this->session->set_flashdata('itemFlashGagal','Harap Melengkapi Form yang Telah Disediakan');
			// $this->load->view('auth/template',$data);
			$this->load->view('auth/templateauthadmin',$data);
		}
		else{
			// print_r(@$_POST);
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$memberid = @$_POST['memberid'];
			
			$dataInsert = array(
				'name' => $first_name.' '.$last_name,
				'username' => $username,
				'password' => $password,
				'email' => $email,
				'tipe' => '',
				'sendmail' => TRUE,
				'memberid' => $memberid,
				);
			
			$url = linkservice('account') ."auth/register/register";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataInsert, $method);

			// print_r($responseApi);
			// exit();
			
			if ($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			} else {
				// print_r($responseApi['response']);
				// echo '<hr>beres';
				redirect('auth/loginCustomer'); 
			}

		}
		
	}
	
}

/* End of file Login.php */
/* Location: ./application/controllers/auth/Login.php */
