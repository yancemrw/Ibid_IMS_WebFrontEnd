<?php

defined('BASEPATH') OR exit('No direct script access allowed');


// menggunakan akun google cloud api sera.digital.transformation@gmail.com 
$config = array(
	'googleplus' => array(
		'application_name' => 'IBID Balang Lelang Astra',
		'client_id' => '874687288066-f2n0vhd3kjp1m2cg66epemtgbpm7c8p2.apps.googleusercontent.com',
		'client_secret' => 'BnsMJ1yYbaXwLlycnhIQJQgZ',
		'redirect_uri' => 'http://localhost:8888/ibiddevelopment/ibiddevapi/ibidadmsuser/index.php/omni/google/callback', 
		'api_key' => '', 
		'scopes' => array(), 
		)
	);