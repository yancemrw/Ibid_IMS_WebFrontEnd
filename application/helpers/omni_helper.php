<?php 

defined('BASEPATH') OR exit('No direct script access allowed'); 

// meload omni facebook untuk keperluan access token



function google()
{
  $CI =& get_instance();
  $CI->load->library('googleplus'); 
  return $CI->googleplus->loginURL();
}



function linkedin()
{
    return site_url('omni/linkedin/linkedin/');
}


function facebook()
{
	$ci =& get_instance();
	require_once  APPPATH.'../omni/facebook/php-sdk-v4/src/Facebook/autoload.php';
	$appid      = '1797631263599363';
	$app_secret = '4c4f11292235c85549f5d3eb5acadb3f'; 
	$fb = new Facebook\Facebook([
          'app_id'                => $appid, // Replace {app-id} with your app id
          'app_secret'            => $app_secret,
          'default_graph_version' => 'v2.2',
          ]);

	$helper = $fb->getRedirectLoginHelper();

    $permissions = ['email']; // Optional permissions

// http://localhost:8888/ibiddevelopment/ibiddevwebapp/ibidadmsuser/ibid_webapp/index.php/auth/register

    // $loginUrl = $helper->getLoginUrl('http://localhost:8888/ibiddevelopment/ibiddevwebapp/ibidadmsuser/ibid_webapp/index.php/omni/facebook/callback/index', $permissions); 
    // $loginUrl = $helper->getLoginUrl('http://localhost:8888/ibiddevelopment/admsui/Ibid_ADMS_WebBackend/index.php/omni/facebook/callback/index', $permissions);
    // $loginUrl = $helper->getLoginUrl('http://localhost:55/02.JOB/ATS/IBID/Ibid_ADMS_WebBackend/index.php/omni/facebook/callback/index', $permissions);
    $loginUrl = $helper->getLoginUrl('http://ibidadmsdevwebfront.azurewebsites.net/index.php/omni/facebook/callback/index', $permissions);

      // print_r(expression)
    return htmlspecialchars($loginUrl); 
  } 


  ?>
