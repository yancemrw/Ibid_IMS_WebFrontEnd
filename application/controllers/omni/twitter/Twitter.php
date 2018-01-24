<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Twitter extends CI_Controller {

	public function index()
	{
 
		require_once APPPATH.'../omni/twitter/twitter_class.php';
		require_once APPPATH.'../omni/twitter/twitteroauth.php'; 

		// if(isset($_GET['connect']) && @$_GET['connect'] == 'twitter'){
			$objTwitterApi = new TwitterLoginAPI;
			$return = $objTwitterApi->login_twitter('twitter');
			
			// exit();
			if($return['error']){
				$return['error'];

			} else {
				header('location:'.$return['url']);
				exit;
			}

		// }

		// print_r($_SESSION);
		// exit();
		// print_r($return);
 
		// exit();

		if(isset($_GET['connected']) && @$_GET['connected'] == 'Y' ){
			$objTwitterApi = new TwitterLoginAPI;
			$return = $objTwitterApi->view(); 
			$array = array(
				'namatwitter' 	=> @$return->name,
				'usernametwitter' 	=> @$return->screen_name,
				'emailtwitter' 	=> @$return->email,
			);
			$this->session->set_userdata( $array );
			
			redirect('afterlogin','refresh'); 
			// print_r($array);
			// exit();


			// print_r($this->session->userdata());

		}
		// else{ 
		// 	echo '<a href="'.site_url('omni/twitter/twitter?connect=twitter').'"><img src="./images/lighter.png" alt="Sign in with Twitter"/></a>';
		// }		
		// exit();
	}

}

/* End of file Twitter.php */
/* Location: ./application/controllers/omni/twitter/Twitter.php */
