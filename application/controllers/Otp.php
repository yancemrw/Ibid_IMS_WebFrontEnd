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

	public function check($phone=null){
		if(!is_null($phone)){
			if(file_exists($file = APPPATH."../sms/".$phone)){
				$f = fopen($file, "r");
				while(! feof($f)){
					$t = "trxID : ";
					$txt = explode($t, fgets($f));
					if(is_array($txt) && count($txt) > 1){
						$trxID = str_replace("\n", '', $txt[1]);
						## get detail users
						$url = linkservice('notif')."api/sms/".$trxID;
						$responseApi = admsCurl($url);
						if ($responseApi['err']) { echo "<hr>cURL Error #:" . $responseApi['err']; } else {
							$sms = json_decode($responseApi['response'],true);
						}
						
						if(isset($sms)){
							foreach ($sms['data'] as $key => $dt) {
								echo $key." : ".$dt."<br />";
							}
							echo "<br /><br />Notes :<br />";
							echo "- Status : 0 = queue, 10 = failed, 20 = success, 100 = trxID not found"; 
							die();
						}
					}
				}
			}
		}
		echo "Tidak ditemukan";
	}
}
