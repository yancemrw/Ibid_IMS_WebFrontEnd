<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linkedin extends CI_Controller { 

	public function __construct(){
        parent::__construct();
        $this->load->helper(array('global'));
        $this->AccessApi = new AccessApi(array_merge($this->config->item('Oauth'),array('username' => 'rendhy.wijayanto@sera.astra.co.id')));
	}

	public function index()
	{ 

		$CI =& get_instance();
		$CI->config->load('linkedin');
		
		require APPPATH .'../omni/linkedin/http.php';
		require APPPATH .'../omni/linkedin/oauth_client.php'; 
		

		if (@$_GET["oauth_problem"] <> "") {
		  // in case if user cancel the login. redirect back to home page.
			$_SESSION["e_msg"] = $_GET["oauth_problem"];
			header("location:index.php");
			exit;
		}


		$client = new oauth_client_class;
		$client->debug = false;
		$client->debug_http = true;
		$client->redirect_uri = $CI->config->item('REDIRECT_URL', 'linkedin');
		$client->client_id = $CI->config->item('API_KEY', 'linkedin');
		$application_line = __LINE__;
		$client->client_secret = $CI->config->item('SECRET_KEY', 'linkedin');
		
		if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
			die('Please go to LinkedIn Apps page https://www.linkedin.com/secure/developer?newapp= , '.
				'create an application, and in the line '.$application_line.
				' set the client_id to Consumer key and client_secret with Consumer secret. '.
				'The Callback URL must be '.$client->redirect_uri).' Make sure you enable the '.
		'necessary permissions to execute the API calls your application needs.';

		$client->scope = $CI->config->item('SCOPE', 'linkedin');
		if (($success = $client->Initialize())) {
			if (($success = $client->Process())) {
				if (strlen($client->authorization_error)) {
					$client->error = $client->authorization_error;
					$success = false;
				} elseif (strlen($client->access_token)) {
					$success = $client->CallAPI(
						'http://api.linkedin.com/v1/people/~:(id,email-address,first-name,last-name,picture-url,public-profile-url,formatted-name)', 
						'GET', array(
							'format'=>'json'
							), array('FailOnAccessError'=>true), $user);
				}
			}
			$success = $client->Finalize($success);
		}
		if ($client->exit) exit;

		$client->scope = $CI->config->item('SCOPE', 'linkedin');
		if (($success = $client->Initialize())) {
			if (($success = $client->Process())) {
				if (strlen($client->authorization_error)) {
					$client->error = $client->authorization_error;
					$success = false;
				} elseif (strlen($client->access_token)) {
					$success = $client->CallAPI(
						'http://api.linkedin.com/v1/people/~:(id,email-address,first-name,last-name,picture-url,public-profile-url,formatted-name)', 
						'GET', array(
							'format'=>'json'
							), array('FailOnAccessError'=>true), $user);
				}
			}
			$success = $client->Finalize($success);
		}
		if ($client->exit) exit; 

		$sesi =	$this->session->userdata();
		$cek = @$sesi['OAUTH_ACCESS_TOKEN']['https://api.linkedin.com/uas/oauth/accessToken']['value'];

		// print_r($user);

		
		if ($cek) { 
			
			$tmp = explode(" ", $user->formattedName);
            $dataLogin = array(
                'grant_type'    => 'password',
                'client_id'     => 'ADMS Web',
                'client_secret' => '1234567890',
                'action'        => '',
                'redirect_url'  => base_url('auth/login'),
                'username'      => $user->emailAddress,
                'password'      => 'admsibid18',
                'ipAddress'     => $this->input->ip_address(),
                'first_name'    => $tmp[0],
                'last_name'     => str_replace($tmp[0]." ","", $user->formattedName)
            );
            $url = linkservice('account') ."auth/oauth2";
            $method = 'POST';
            $responseApi = admsCurl($url, $dataLogin, $method);
            $resp = (array) json_decode($responseApi['response']);
            if(isset($resp['error'])){
                $dataLogin = array_merge($dataLogin, array('action'=>'register', 'GroupId' => 9, 'Active' => 1));
                $responseApi = admsCurl($url, $dataLogin, $method);
                $res = (array) json_decode($responseApi['response']);
                if(!isset($res['error'])){
                    $this->AccessApi->setAccess('in',(array)$res);
                    redirect('akun/dasbor','refresh');
                } else
                    redirect('auth/login','refresh');
                
            } else {
                $this->AccessApi->setAccess('in',$resp);
                redirect('akun/dasbor','refresh');
            }
			
			// $array = array(
			// 	'namelinkedin' => $user->formattedName, 
			// 	'emaillinkedin' => $user->emailAddress 
			// 	);

			// $this->session->set_userdata( $array );
			// print_r($this->session->all_userdata());

			// redirect('omni/linkedin/register','refresh');
			// redirect('afterlogin','refresh');

			// echo "sukses";
		} else { 
			redirect('auth/register','refresh');
		} 
	}

}

/* End of file Linkedin.php */
/* Location: ./application/controllers/omni/Linkedin.php */
