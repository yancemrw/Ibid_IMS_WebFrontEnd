<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Twitters extends CI_Controller {

	function __construct()
	{

		

	}

	public function index()
	{
		session_start();
		require_once  APPPATH.'../omni/twitter/twitteroauth.php';
		require_once  APPPATH.'../omni/twitter/twitter_class.php'; 

		if(isset($_GET['connect']) && $_GET['connect'] == 'twitter'){
			$objTwitterApi = new TwitterLoginAPI;
			$return = $objTwitterApi->login_twitter($_GET['connect']);
			if($return['error']){
				echo $return['error'];
			}else{
				header('location:'.$return['url']);
				exit;
			}

		}

		$objTwitterApi = new TwitterLoginAPI;
		$return = $objTwitterApi->view();

		print_r($return); 
		
	}

	public function callback()
	{
		if (isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) {
			$_SESSION['oauth_status'] = 'oldtoken';
			header('Location: destroy.php');
		}else{
			$objTwitterApi = new TwitterLoginAPI;
			$connection = $objTwitterApi->twitter_callback();
			if( $connection == 'connected'){
				// konek
				redirect('omni/twitter','refresh');
				exit;
			}else{
				echo "tidak konek";
				exit;
			}
		}
	}

}

/* End of file Twitter.php */
/* Location: ./application/controllers/omni/Twitter.php */
