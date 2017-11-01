<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$respon = array(
	'status'	=> 0,
	'message'	=> $heading,
	'data'	=> []);

echo  json_encode($respon);
