<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function json_output($statusHeader,$response)
{
	$ci =& get_instance();
	$ci->output->set_content_type('application/json');
	$ci->output->set_status_header($statusHeader);
	$ci->output->set_output(json_encode($response));
}

function query_salah()
{
	$response = array(
		'error'     => 'Query Salah',
		'action'    => false,
		'status'    => 'error'
		);     
	header('Content-Type: application/json'); 
	echo json_encode($response); 
}

