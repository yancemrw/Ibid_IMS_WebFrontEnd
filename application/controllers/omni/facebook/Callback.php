<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

// if(!isset($_SESSION)) 
// { 
//     session_start(); 
// } 

// meload omni facebook untuk keperluan access token
require_once  APPPATH.'../omni/facebook/php-sdk-v4/src/Facebook/autoload.php';


Class Callback extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('global'));
        $this->AccessApi = new AccessApi(array_merge($this->config->item('Oauth'),array('username' => 'rendhy.wijayanto@sera.astra.co.id')));
    }

    public function index()
    { 
      // session_start();

      $fb = new Facebook\Facebook([ 
          'app_id' => $this->config->item('fb')['app_id'], // Replace {app-id} with your app id
          'app_secret' => $this->config->item('fb')['app_secret'],
          'default_graph_version' => 'v2.2', 
          // 'persistent_data_handler'=>'session'
      ]);

      $helper = $fb->getRedirectLoginHelper();
       // $helper = $fb->getRedirectLoginHelper(); 
       if (isset($_GET['state'])) { $helper->getPersistentDataHandler()->set('state', $_GET['state']); }

        // Trick below will avoid "Cross-site request forgery validation failed. Required param "state" missing." from Facebook
      $_SESSION['FBRLH_state'] = @$_GET['state']; 

      try {
       $accessToken = $helper->getAccessToken();
   } catch(Facebook\Exceptions\FacebookResponseException $e) {
              // When Graph returns an error
       echo $pesan = 'Graph returned an error: ' . $e->getMessage();
       exit;
   } catch(Facebook\Exceptions\FacebookSDKException $e) {
              // When validation fails or other local issues
       echo $pesan = 'Facebook SDK returned an error: ' . $e->getMessage();
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
            $tokenMetadata->validateAppId($this->config->item('fb')['app_id']); // Replace {app-id} with your app id
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

            // omni Oauth login
            $tmp = explode(" ", $user['name']);
            $dataLogin = array(
                'grant_type'    => 'password',
                'client_id'     => 'ADMS Web',
                'client_secret' => '1234567890',
                'action'        => '',
                'redirect_url'  => base_url('auth/login'),
                'username'      => @$user['email'],
                'password'      => 'admsibid18',
                'ipAddress'     => $this->input->ip_address(),
                'first_name'    => $tmp[0],
                'last_name'     => str_replace($tmp[0]." ","", $user['name']),
                'ByOmni'        => 'facebook'
            );
            $url = linkservice('account') ."auth/oauth2";
            $method = 'POST';
            $responseApi = admsCurl($url, $dataLogin, $method);
            $resp = json_decode($responseApi['response'] , true);

            // print_r($resp);
            // exit();


            if(isset($resp['error'])){
                $dataLogin = array_merge($dataLogin, array('action'=>'register', 'GroupId' => 9, 'Active' => 1));
                $responseApi = admsCurl($url, $dataLogin, $method);
                $res = json_decode($responseApi['response'] , true);
                if(!isset($res['error'])){
                    $this->AccessApi->setAccess('in',(array)$res);
                    redirect('dashboard','refresh'); 
                    // echo "1";
                    // print_r($dataLogin);
                } else {
                    redirect('auth/login','refresh');
                    // echo "2";
                    // print_r($dataLogin);
                }
                
            } else {
                $this->AccessApi->setAccess('in',$resp);
                redirect('dashboard','refresh');
            }

            // mendaftarkan hasil callback ke session
            // $setfacebook = array(
            // 	'tokenfb' => @$token,
            // 	'namefb' => @$user['name'],
            // 	'emailfb' => @$user['email'],
            // 	'usernamefb' => @$user['username'],
            // );
            
            // $this->session->set_userdata( $setfacebook );

            // redirect ke halaman register facebook
            // redirect('omni/facebook/register','refresh');


            // redirect('afterlogin','refresh'); 


        }
    }
