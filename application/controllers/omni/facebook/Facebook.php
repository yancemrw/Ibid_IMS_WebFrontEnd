<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

if(!session_id()) {
    session_start();
}

// meload omni facebook untuk keperluan access token
require_once  APPPATH.'../omni/facebook/php-sdk-v4/src/Facebook/autoload.php';


Class Facebook extends CI_Controller
{

  public function index()
  {

    $this->load->helper('omni'); 
    echo facebook();
  } 
  
}
