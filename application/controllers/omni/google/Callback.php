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
		$this->load->library('googleplus');
		/*
		* ini adalah callback dari oauth facebook. 
		* jika digunakan di front end harus ada treathment khusus.
		*/ 
		if (isset($_GET['code'])) {
			// http://localhost:8888/ibiddevelopment/ibiddevapi/ibidadmsuser/index.php/omni/google/callback?code=4/iuwDY-oakWyJ46Kw4f1GTAlaXLoTzwmuS1_QwJAOJVo#
			$this->googleplus->getAuthenticate();  
			// print_r($this->googleplus->getUserInfo());
			$data = $this->googleplus->getUserInfo(); 

			$tmp = explode(" ", $data['name']);
            $dataLogin = array(
                'grant_type'    => 'password',
                'client_id'     => 'ADMS Web',
                'client_secret' => '1234567890',
                'action'        => '',
                'redirect_url'  => base_url('auth/loginCustomer'),
                'username'      => $data['email'],
                'password'      => 'admsibid18',
                'ipAddress'     => $this->input->ip_address(),
                'first_name'    => $tmp[0],
                'last_name'     => str_replace($tmp[0]." ","", $data['name'])
            );
            $url = linkservice('account') ."auth/oauth2";
            $method = 'POST';
            $responseApi = admsCurl($url, $dataLogin, $method);
            $resp = (array) json_decode($responseApi['response']);
            if(isset($resp['error'])){
                $dataLogin = array_merge($dataLogin, array('action'=>'register', 'GroupId' => 9, 'Active' => 1));
                $responseApi = admsCurl($url, $dataLogin, $method);
print_r($responseApi);
die();
                $res = json_decode($responseApi['response']);
                if(!isset($res['error'])){
                    $this->AccessApi->setAccess('in',(array)$res);
                    redirect('afterlogin','refresh');
                } else
                    redirect('auth/loginCustomer','refresh');
                
            } else {
                $this->AccessApi->setAccess('in',$resp);
                redirect('afterlogin','refresh');
            }

			// $array = array(
			// 	'emailgoogle' 	=> @$data['email'],
			// 	'namegoogle' 	=> @$data['name'],
			// );
			
			// $this->session->set_userdata( $array );


			// redirect('afterlogin','refresh');

		} else {
			//mengembalikan ke auth register
			redirect('auth/register','refresh');
			// redirect('afterlogin','refresh');
		}
		
	}

}

/* End of file Callback.php */
/* Location: ./application/controllers/omni/google/Callback.php */
