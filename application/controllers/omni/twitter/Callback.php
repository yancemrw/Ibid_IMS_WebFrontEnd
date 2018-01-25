<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callback extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper(array('global'));
        $this->AccessApi = new AccessApi(array_merge($this->config->item('Oauth'),array('username' => 'rendhy.wijayanto@sera.astra.co.id')));
	}

	public function index()
	{
		// session_start();
		require_once APPPATH.'../omni/twitter/twitter_class.php';
		require_once APPPATH.'../omni/twitter/twitteroauth.php';
		
		if (isset($_REQUEST['oauth_token']) && @$_SESSION['oauth_token'] !== @$_REQUEST['oauth_token']) {
			@$_SESSION['oauth_status'] = 'oldtoken'; 
			// header('Location: destroy.php');
			redirect('auth/login','refresh');
		}else{
			$objTwitterApi = new TwitterLoginAPI;
			$connection = $objTwitterApi->twitter_callback();
			if( $connection == 'connected'){

				$objTwitterApi = new TwitterLoginAPI;
				$return = $objTwitterApi->view();  

				$tmp = explode(" ", $return->name);
	            $dataLogin = array(
	                'grant_type'    => 'password',
	                'client_id'     => 'ADMS Web',
	                'client_secret' => '1234567890',
	                'action'        => '',
	                'redirect_url'  => base_url('auth/login'),
	                'username'      => $return->email,
	                'password'      => 'admsibid18',
	                'ipAddress'     => $this->input->ip_address(),
	                'first_name'    => $tmp[0],
	                'last_name'     => str_replace($tmp[0]." ","", $return->name)
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
	                    redirect('afterlogin','refresh');
	                } else
	                    redirect('auth/login','refresh');
	                
	            } else {
	                $this->AccessApi->setAccess('in',$resp);
	                redirect('afterlogin','refresh');
	            }

				// $array = array(
				// 	'namatwitter' 	=> @$return->name,
				// 	'usernametwitter' 	=> @$return->screen_name,
				// 	'emailtwitter' 	=> @$return->email,
				// );
				// $this->session->set_userdata( $array );

				// redirect('afterlogin','refresh'); 

				
				// $objTwitterApi = new TwitterLoginAPI;
				// $return = $objTwitterApi->view();

				// $array = array(
				// 	'namatwitter' 	=> @$return['name'],
				// 	'usernametwitter' 	=> @$return['screen_name'],
				// 	'emailtwitter' 	=> @$return['email'],
				// );

				// $this->session->set_userdata( $array );

				// redirect('afterlogin','refresh'); 

				// header("Location: twitter?connected=Y");
				// redirect('omni/twitter/twitter?connected=Y','refresh');
				exit;
			} else {
				// header("Location: twitter?connected=F");
				// $this->session->set_flashdata('message', '<div class="alert alert-warning"> Kesalahan Terjadi, Silahkan diulangi kembali. </div>');
				$this->session->set_flashdata('message', array('error' , 'Kesalahan Terjadi' , 'Gagal'));
				redirect('auth/login','refresh');
				exit;
			}
		}
	}

}

/* End of file Callback.php */
/* Location: ./application/controllers/omni/twitter/Callback.php */
