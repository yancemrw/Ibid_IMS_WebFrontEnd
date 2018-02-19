<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function admsCurl($url, $dataArray = array(), $method='GET' ){
	$ci =& get_instance();
	
	$dataPost = http_build_query($dataArray);
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_PORT => "",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 60,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_HTTPHEADER => array(
		"content-type: application/x-www-form-urlencoded"
		), 
		
		CURLOPT_URL => $url,
		CURLOPT_POSTFIELDS => $dataPost,
		CURLOPT_CUSTOMREQUEST => $method,
		
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);
	
	return array(
		'response' => $response,
		'err' => $err,
	);
} 

function amsCurl($url, $dataPost='', $method='GET' ){ 
	$ci =& get_instance(); 
	 
	$curl = curl_init(); 
	curl_setopt_array($curl, array( 
		CURLOPT_PORT => "", 
		CURLOPT_RETURNTRANSFER => true, 
		CURLOPT_ENCODING => "", 
		CURLOPT_MAXREDIRS => 10, 
		CURLOPT_TIMEOUT => 60, 
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, 
		CURLOPT_HTTPHEADER => array( 
			"content-type: application/json" 
		),  
		 
		CURLOPT_URL => $url, 
		CURLOPT_POSTFIELDS => $dataPost, 
		CURLOPT_CUSTOMREQUEST => $method, 
		 
	)); 
 
	$response = curl_exec($curl); 
	$err = curl_error($curl); 
 
	curl_close($curl); 
	 
	return array( 
		'response' => $response, 
		'err' => $err, 
	); 
} 

function admsmethod($tipe)
{
	$method = $_SERVER['REQUEST_METHOD'];
	if($method != trim(strtoupper($tipe))){ 
		$response = admsapi(400, 0, 'Kesalahan Permintaan', []); 
		return FALSE;
	} else { return TRUE; }
	return;
}


function admssave($nama = '' , $desc = '')
{
	return $return = '<button type="submit" class="btn btn-success pull-right" data-provide="tooltip" data-placement="top" title="'.$desc.'" data-original-title="'.$desc.'" >'.$nama.'</button> '; 
}



function admsaction($link='' , $id = '' , $color = '' , $fa = '' , $nama = '')
{
	return $return = '<a href="'.$link.'/'.$id.'" class="btn btn-'.$color.' btn-xs ttipDatatables" data-provide="tooltip" data-placement="top" title="'.$nama.'" data-original-title="'.$nama.'" ><i class="'.$fa.'"></i></a>';
}

function curlGenerate($param, $callback = 'data') {
	$json_decode = json_decode($param['response']);
	if($callback === 'status') {
		return $json_decode->status;
	}
	else if($callback === 'description') {
		return $json_decode->description;
	}
	else if($callback === 'data') {
		return @$json_decode->data;
	}
}

/**
* class for api checker and other
*/
class AccessApi
{
	private $sess = FALSE,
			$ci = FALSE,
			$sess_initial = 'userdata';
	public $redirect_url = FALSE,
			$message = array(
				'session' => 'Your session is end',
				'logout' => 'You was log out',
				'login' => 'You are log in'
			),
			$config = array(
				'client_id' => FALSE,
				'client_secret' => FALSE,
				'username' => FALSE
			);

	public function __construct($config=FALSE){
		$this->ci = &get_instance();
		$this->sess = (array)$this->ci->session->userdata($this->sess_initial);
		$this->redirect_url = base_url('auth/login');
		if($config){
			if(is_array($config)){
				$this->config = array_merge($this->config, $config);
				if(isset($config['redirect_url']))
					$this->redirect_url = $config['redirect_url'];
			}
		}
	}

	public function access(){
		if($this->sess){
			$data = array(
				'access_token'	=> $this->sess['access_token']
			);
			$responseApi = $this->load('POST', linkservice('account') ."auth/oauth2/check", $data);
			$ret 	= $responseApi['err']?FALSE : TRUE;
			if($ret)
				$rest = (array)json_decode($responseApi['response']);

			return ($ret?(isset($rest['success'])?isset($rest['success']):FALSE):FALSE);
		}
		return FALSE;
	}

	public function load($type = FALSE, $link=FALSE, $data=FALSE){
		if($type && $link && $data){
			return admsCurl($link, $data, $type);
		}
		return FALSE;
	}

	public function check_login(){
		$access = $this->access();
		if($this->sess && !$access){
			$data = array(
				'grant_type' => 'refresh_token',
				'refresh_token'	=> $this->sess['refresh_token'],
				'client_id' => $this->config['client_id'],
				'client_secret' => $this->config['client_secret'],
				'username' => $this->config['username'],
			);
			$responseApi = $this->load('POST', linkservice('account') ."auth/oauth2", $data);
			$ret 	= $responseApi['err']?FALSE : TRUE;
			if($ret){
				$rest = (array) json_decode($responseApi['response']);
				if(!isset($rest['error']))
					$this->ci->session->set_userdata($this->sess_initial,array_merge($this->sess, $rest));
			}

		} else if(!$this->sess && !$access && $this->redirect_url){
			//$this->ci->session->set_flashdata('message', '<div class="alert alert-danger">'.$this->getMessage('session').'</div>');
			$this->ci->session->set_flashdata('message', array('warning', 'Harap login terlebih dahulu!'));
			redirect($this->redirect_url, 'refresh');
		}
		return TRUE;
	}

	public function checkApi(){
		$access = $this->access();
		if($this->sess && !$access){
			$data = array(
				'grant_type' => 'refresh_token',
				'refresh_token'	=> $this->sess['refresh_token'],
				'client_id' => $this->config['client_id'],
				'client_secret' => $this->config['client_secret'],
				'username' => $this->config['username'],
			);
			$responseApi = $this->load('POST', linkservice('account') ."auth/oauth2", $data);
			$ret 	= $responseApi['err']?FALSE : TRUE;
			if($ret){
				$rest = (array) json_decode($responseApi['response']);
				if(!isset($rest['error'])){
					echo json_encode(array('response'=>array('allow' => true), 'err' => NULL));
					die();
				}
			}
		}
		
		echo json_encode(array('response'=>NULL, 'error' => $this->getMessage('notAllow')));
		die();
	}

	public function setAccess($type=FALSE, $data=false){
		if($type && $data){
			if(strtolower($type) == 'in' && is_array($data)){
				$this->ci->session->set_userdata($this->sess_initial,$data);
				return TRUE;
			}
		} else if(strtolower($type) == 'out' && !$data){
			$this->ci->session->unset_userdata($this->sess_initial);
			return TRUE;
		}
		return FALSE;
	}

	public function getMessage($code=FALSE){
		return ($code?$this->message[$code]:FALSE);
	}
}
/* End of file Adms_helper.php */
/* Location: ./application/helpers/Adms_helper.php */
 
