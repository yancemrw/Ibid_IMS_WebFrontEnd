<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callback extends CI_Controller {

	public function __construct(){
        parent::__construct();
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

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
            try{
                $this->googleplus->getAuthenticate();  
                $data = $this->googleplus->getUserInfo(); 
            } catch(Exception $e){
                $data = false;
            }

            print_r($data); die();

            if($data){
                $tmp = explode(" ", $data['name']);
                $dataLogin = array(
                    'grant_type'    => 'password',
                    'client_id'     => 'ADMS Web',
                    'client_secret' => '1234567890',
                    'action'        => '',
                    'redirect_url'  => base_url('auth/login'),
                    'username'      => $data['email'],
                    'password'      => 'admsibid18',
                    'ipAddress'     => $this->input->ip_address(),
                    'first_name'    => $tmp[0],
                    'last_name'     => str_replace($tmp[0]." ","", $data['name']),
                    'ByOmni'        => 'google'
                );
                $url = linkservice('account') ."auth/oauth2";
                $method = 'POST';
                $responseApi = admsCurl($url, $dataLogin, $method);
                $resp =  json_decode($responseApi['response'] , true);
                if(isset($resp['error'])){
                    $dataLogin = array_merge($dataLogin, array('action'=>'register', 'GroupId' => 9, 'Active' => 1));
                    $responseApi = admsCurl($url, $dataLogin, $method);
                    $res =  json_decode($responseApi['response'],true);
                    if(!isset($res['error'])){
                        $this->AccessApi->setAccess('in',(array)$res);
                        redirect(site_url(),'refresh');
                    } else
                        redirect('auth/login','refresh');
                    
                } else {
                    $this->AccessApi->setAccess('in',$resp);
                    redirect(site_url(),'refresh');
                }
            } else {
                redirect('auth/login','refresh');
            }

		} else {
			//mengembalikan ke auth register
			redirect('auth/register','refresh');
		}
		
	}

}

/* End of file Callback.php */
/* Location: ./application/controllers/omni/google/Callback.php */
