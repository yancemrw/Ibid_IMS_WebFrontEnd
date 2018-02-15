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
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Mail', 'required|valid_email');
		$this->form_validation->set_rules('pass', 'Sandi', 'required|min_length[8]');
		$this->form_validation->set_rules('repass', 'Ulangi Sandi', 'required|matches[pass]');
		// $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if($this->form_validation->run() === FALSE) {
			// if ($_SERVER['REQUEST_METHOD'] == 'POST')
			// $this->session->set_flashdata('itemFlashGagal','Harap Melengkapi Form yang Telah Disediakan');
			// $this->load->view('auth/template',$data);
			// $this->load->view('auth/templateauthadmin',$data);
			$userdata = $this->session->userdata('userdata');
			$data = array(
				'header_white'	=> "header-white",
				'userdata'		=> $this->session->userdata('userdata'),
				'title'			=> 'Pendaftaran',
				'form_auth_mobile' => login_status_form_mobile($userdata),
				'form_auth'		=> login_Status_form($userdata)
			);
			$view = "auth/register";
			template($view, $data);
		}
		else {
			$dataInsert = array(
				// 'grant_type'	=> 'password',
				// 'client_id'		=> 'ADMS Web',
				// 'client_secret'	=> '1234567890',
				// 'action'		=> 'register',
				// 'redirect_url'	=> base_url('auth/login'),
				'username'		=> $this->input->post('email'),
				'email'			=> $this->input->post('email'),
				'first_name'	=> $this->input->post('name'),
				'password'		=> $this->input->post('pass')
				//'last_name'   	=> '',
				// 'MemberCardTMP' => $this->input->post('idcard'), //member card
				// 'ipAddress'		=> $this->input->ip_address(),
				// 'GroupId'		=> 9,
				// 'createdOn'		=> time(), 
			);

			// cek email first, if exists cannot register
			$urls = linkservice('account')."auth/checkemail";
			$meth = 'POST';
			$resp = admsCurl($urls, $dataInsert, $meth);

			// print_r($resp);
			// exit();

			$jsondec = json_decode($resp);
			if($jsondec->status === 0) {
				$url = linkservice('account')."auth/Registerfrontend/register";
				$method = 'POST';
				$responseApi = admsCurl($url, $dataInsert, $method);

				if($responseApi['err']) {
					echo "<hr>cURL Error #:".$responseApi['err'];
				}
				else {
					$this->session->set_flashdata('message', array('success', 'Akun anda sudah terdaftar, Silahkan verifikasi email dari kami'));
					redirect('login'); 
				}
			}
			else {
				$this->session->set_flashdata('message', array('warning', 'Email sudah terdaftar'));
				redirect('register', 'refresh');
			}

		}
		
	}
	
}

/* End of file Login.php */
/* Location: ./application/controllers/auth/Login.php */
