<?php  

function template($view='' , $data = '')
{
	$ci =& get_instance(); 
	$ci->load->view('template/header' , $data);
	$ci->load->view($view , $data); // content
	$ci->load->view('template/footer' , $data);
	// $ci->load->view('template/menubar' , $data);
	// $ci->load->view('template/footer' , $data); // content
}

?>
