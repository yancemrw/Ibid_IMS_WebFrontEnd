<?php
class TwitterLoginAPI
{
	protected  $consumer_key	 = 'NLZQJM6TiB9sriugja43P0xCj'; //Your Consumer Key
	// protected  $consumer_key	 = '9MwkTX36Chjt8GkDCgOoagdC8'; //Your Consumer Key 
	// protected  $consumer_secret	 = 'AfDHm0kxdILjMHaHVPgc9Lb7MfRF4c1Kev6QRiwR2Bp1slUUXj'; 
	protected  $consumer_secret	 = 'OZmLtsKQPc7EsFasn9zZZt8NvxWKkxtrsubz77Cbi2nPPGQE0L'; //Your Consumer Secret Key
	// protected  $oauth_callback	 = 'http://demo.stepblogging.com/twitter-oauth/callback.php';
	protected  $oauth_callback	 = 'http://ibid.astra.co.id/omni/twitter/callback';
	
	function login_twitter($twitter_connect = ''){
		if ($this->consumer_key === '' || $this->consumer_secret === '') {
			$err  = 'You need a consumer key and secret to test the sample code. Get one from <a href="https://twitter.com/apps">https://twitter.com/apps</a>';
			$array_return = array('error' => $err);
			return $array_return;
		}
		
		if($twitter_connect=='twitter'){
			$connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret);// Key and Sec
			$request_token = $connection->getRequestToken($this->oauth_callback);// Retrieve Temporary credentials. 
			
			// print_r($request_token);
			// exit();
			// session_start();

			@$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
			@$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
			
			switch ($connection->http_code) {
				case 200:    
					$url = $connection->getAuthorizeURL($token); // Redirect to authorize page.
					$array_return = array('url' => $url);
					return $array_return;
					break;
				default:
					$err  = 'Could not connect to Twitter. Refresh the page or try again later.';
					$array_return = array('error' => $err);
					return $array_return;
			}
		}else{
			$err  = 'Could not connect to Twitter. Refresh the page or try again later.';
			$array_return = array('error' => $err);
			return $array_return;
		}
		
	}
	
	function twitter_callback(){
		$connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret, @$_SESSION['oauth_token'], @$_SESSION['oauth_token_secret']);
		$access_token = $connection->getAccessToken($_GET['oauth_verifier']);	
		@$_SESSION['access_token'] = $access_token;
		unset($_SESSION['oauth_token']);
		unset($_SESSION['oauth_token_secret']);

		if (200 == $connection->http_code) {
			@$_SESSION['status'] = 'verified';
			return 'connected';
		} else {
			return 'failed';
		}
	}
	
	function view(){
		$access_token = @$_SESSION['access_token'];
		$connection = new TwitterOAuth($this->consumer_key, $this->consumer_secret, @$access_token['oauth_token'],@$access_token['oauth_token_secret']);
		$content = $connection->get('account/verify_credentials',['include_email' => 'true']);

		$return_array = $content;

		// $return_array = array(
		// 						'profile_image_url' => 	@$content->profile_image_url,
		// 						'name'			=> 	@$content->name,
		// 						'followers_count' => @$content->followers_count,
		// 						'friends_count' => @$content->friends_count,
		// 						'location' => @$content->location
		// 					);
		return $return_array;
	}
}
