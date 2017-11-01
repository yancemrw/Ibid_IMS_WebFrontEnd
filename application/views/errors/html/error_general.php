<?php  
// {

//     "status": 1,
//     "message": "Welcome to Service Front End",
//     "data": ""

// }


$respon = array(
	'status'	=> 0,
	'message'	=> $message,
	'data'	=> []);

echo  json_encode($respon); ?> 
