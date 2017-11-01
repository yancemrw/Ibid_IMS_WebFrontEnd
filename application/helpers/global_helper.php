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
/* End of file Adms_helper.php */
/* Location: ./application/helpers/Adms_helper.php */
 
