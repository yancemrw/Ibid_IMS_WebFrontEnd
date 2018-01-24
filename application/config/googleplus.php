<?php

defined('BASEPATH') OR exit('No direct script access allowed');


// menggunakan akun google cloud api sera.digital.transformation@gmail.com 
$config = array(
	'googleplus' => array(
		'application_name' => 'IBID Balang Lelang Astra',
		'client_id' => '874687288066-f2n0vhd3kjp1m2cg66epemtgbpm7c8p2.apps.googleusercontent.com',
		'client_secret' => 'BnsMJ1yYbaXwLlycnhIQJQgZ',
		// http://localhost:8888/ibiddevelopment/ibiddevwebapp/ibidadmsuser/ibid_webapp/index.php/omni/google/google
		// 'redirect_uri' => 'http://localhost:55/02.JOB/ATS/IBID/Ibid_ADMS_WebBackend/index.php/omni/google/callback', 
		'redirect_uri' => 'http://'.$_SERVER["HTTP_HOST"].str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']).'index.php/omni/google/callback', 
		'api_key' => '', 
		'scopes' => array(), 
		)
	);


// http://localhost:8888/ibiddevelopment/admsui/Ibid_ADMS_WebBackend/index.php/omni/google/callback?code=4/i0BDOiRAvRmDjb1e0H-g5iI9NN9h5066eibsoRVx7JM#
