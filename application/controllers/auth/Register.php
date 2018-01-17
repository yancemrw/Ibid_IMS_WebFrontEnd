<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->library(array('form_validation'));
		$this->load->helper(array('global', 'omni'));
	}
	
	public function index() {

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
		
		$this->form_validation->set_rules('first_name', 'First name', 'required');
		$this->form_validation->set_rules('last_name', 'Last name', 'required');
		$this->form_validation->set_rules('username', 'username', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]');
		$this->form_validation->set_rules('repassword', 'RePassword', 'required|matches[password]');
		// $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if ($this->form_validation->run() == FALSE){
			// if ($_SERVER['REQUEST_METHOD'] == 'POST')
				// $this->session->set_flashdata('itemFlashGagal','Harap Melengkapi Form yang Telah Disediakan');
			// $this->load->view('auth/template',$data);
			//$this->load->view('auth/templateauthadmin',$data);
			$userdata = $this->session->userdata('userdata');
			$data = array(
				'header_white'	=> "header-white",
				'userdata'		=> $this->session->userdata('userdata'),
				'title'			=> 'Pendaftaran',
				'form_auth'		=> login_Status_form($userdata)
			);
			$view = "auth/register";
			template($view, $data);
		}
		else{
			// print_r(@$_POST);
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$username = $_POST['username'];
			$email = $_POST['username'];
			$password = $_POST['password'];
			$memberid = @$_POST['memberid'];
			
			// $dataInsert = array(
			// 	'first_name' => $first_name,
			// 	'last_name' => $last_name,
			// 	'username' => $username,
			// 	'password' => $password,
			// 	'email' => $email,
			// 	'tipe' => '',
			// 	'sendmail' => TRUE,
			// 	'memberid' => $memberid,
			// 	); 
			// $url = linkservice('account') ."auth/register/register";
			// $method = 'POST';
			// $responseApi = admsCurl($url, $dataInsert, $method);

			$dataInsert = array(
				'grant_type'	=> 'password',
				'client_id'		=> 'ADMS Web',
				'client_secret'	=> '1234567890',
				'action'		=> 'register',
				'redirect_url'	=> base_url('auth/loginCustomer'),
				'username'     	=> $username,
				'password'      => $password,
				'first_name'   	=> $first_name,
				'last_name'   	=> $last_name,
				// member card
				'MemberCardTMP' => $memberid,
				'ipAddress'		=> $this->input->ip_address(),
				'GroupId'		=> 9,
				'createdOn'		=> time(), 
			);

			$url = linkservice('account') ."auth/oauth2";
			$method = 'POST';
			$responseApi = admsCurl($url, $dataInsert, $method); 

			// print_r($responseApi);
			// exit();
			
			if ($responseApi['err']) {
				echo "<hr>cURL Error #:" . $responseApi['err'];
			} else {
				// echo "<pre>"; print_r($responseApi); die();
				$dataInsert =  array (
					'type' => 'email',
					'to' => $username,
					'cc' => 'lutfi.f.hidayat@gmail.com',
					'subject' => 'Email Verification IBID',
					'body' => '
					<p>Email Verifikasi </p>
					<a href="'.linkservice('frontend').'auth/verify?email='.$username.'"> Klik Disini </a>
					'
				); 

				$url 			= "http://ibidadmsdevservicenotification.azurewebsites.net/api/notification";
				$method 		= 'POST';
				$responseApi 	= admsCurl($url, $dataInsert, $method);


				redirect('auth/loginCustomer'); 
			}

		}
		
	}
	
}

/* End of file Login.php */
/* Location: ./application/controllers/auth/Login.php */
