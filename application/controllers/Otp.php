<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otp extends CI_Controller { 
	public function index($phone=null){
		if(!is_null($phone)){
			if(file_exists($file = APPPATH."../sms/".$phone)){
				$f = fopen($file, "r");
				while(! feof($f)){
					echo fgets($f). "<br />";
				}
				die();
			}
		}
		echo "Tidak ditemukan";
	}
}
