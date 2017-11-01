<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

// meload omni facebook untuk keperluan access token
require_once  APPPATH.'../omni/facebook/php-sdk-v4/src/Facebook/autoload.php';


Class Callback extends CI_Controller
{
	var $appid      = '1797631263599363';
	var $app_secret = '4c4f11292235c85549f5d3eb5acadb3f'; 

	public function index()
	{ 
		// session_start();

		$fb = new Facebook\Facebook([ 
          'app_id' => $this->appid, // Replace {app-id} with your app id
          'app_secret' => $this->app_secret,
          'default_graph_version' => 'v2.2', 
          ]);

		$helper = $fb->getRedirectLoginHelper();

        // Trick below will avoid "Cross-site request forgery validation failed. Required param "state" missing." from Facebook
		$_SESSION['FBRLH_state'] = @$_REQUEST['state']; 

		try {
			$accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
              // When Graph returns an error
			$pesan = 'Graph returned an error: ' . $e->getMessage();
			exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
              // When validation fails or other local issues
			$pesan = 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}

		if (! isset($accessToken)) {
			if ($helper->getError()) {
				header('HTTP/1.0 401 Unauthorized');
				echo "Error: " . $helper->getError() . "\n";
				echo "Error Code: " . $helper->getErrorCode() . "\n";
				echo "Error Reason: " . $helper->getErrorReason() . "\n";
				echo "Error Description: " . $helper->getErrorDescription() . "\n";
			} else {
				header('HTTP/1.0 400 Bad Request');
				echo 'Bad request';
			} 
			exit;
		} 
                    // The OAuth 2.0 client handler helps us manage access tokens
		$oAuth2Client = $fb->getOAuth2Client();

                    // Get the access token metadata from /debug_token
		$tokenMetadata = $oAuth2Client->debugToken($accessToken); 

            // Validation (these will throw FacebookSDKException's when they fail)
            $tokenMetadata->validateAppId($this->appid); // Replace {app-id} with your app id
            // If you know the user ID this access token belongs to, you can validate it here
            //$tokenMetadata->validateUserId('123');
            $tokenMetadata->validateExpiration();

            if (! $accessToken->isLongLived()) {
              // Exchanges a short-lived access token for a long-lived one
            	try {
            		$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            	} catch (Facebook\Exceptions\FacebookSDKException $e) {
            		echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
            		exit;
            	}

              // echo '<h3>Long-lived</h3>';
              // var_dump($accessToken->getValue());
            }

            // bagian ini mendapatkan profil setelah mendapatkan token dari pelogin
            $token = (string) $accessToken;  

            $pesan = 'Sukses Get Token';

            try {
              // Returns a `Facebook\FacebookResponse` object
            	$response = $fb->get('/me?fields=id,name,email', $token);
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
            	$pesan =  'Graph returned an error: ' . $e->getMessage();
            	exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
            	$pesan = 'Facebook SDK returned an error: ' . $e->getMessage();
            	exit;
            }
            $user = $response->getGraphUser();
            // end
 		
 			// jika email si pengguna facebook sudah pernah diregisterkan sebelumnya


            // mendaftarkan hasil callback ke session
            $setfacebook = array(
            	'tokenfb' => @$token,
            	'namefb' => @$user['name'],
            	'emailfb' => @$user['email'],
            	'usernamefb' => @$user['username'],
            );
            
            $this->session->set_userdata( $setfacebook );

            // redirect ke halaman register facebook
            // redirect('omni/facebook/register','refresh');


            redirect('afterlogin','refresh'); 


        }
    }
