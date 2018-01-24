<head>
	<title>Login with Account Kit</title>
	<link rel="shortcut icon" href="ak-icon.png">
	<link rel="stylesheet" href="css.css">
	<!--Hotlinked Account Kit SDK-->
	<script src="https://sdk.accountkit.com/en_EN/sdk.js"></script>
</head>
<body>
	<h1 class="ac">Login with Account Kit</h1>
	<!-- <p class="ac">This example shows you how to implement<br>Facebook Account Kit for web using PHP.</p> -->
	<div class="buttons">
		<button onclick="phone_btn_onclick();">Login with SMS</button>
		<!-- <button onclick="email_btn_onclick();">Login with Email</button> -->
	</div>
	<form action="" method="POST" id="my_form">
		<input type="hidden" name="code" id="code">
		<input type="hidden" name="csrf_nonce" id="csrf_nonce">
	</form>
</body>

<?php 

if (isset($_POST["code"])) {
	// session_start();
	$_SESSION["code"] = $_POST["code"];
	$_SESSION["csrf_nonce"] = $_POST["csrf_nonce"];
	$ch = curl_init();
    // Set url elements
	$fb_app_id = '1797631263599363';
	$ak_secret = '0bac46e8e2c29681f5657b4433a775af';
	$token = 'AA|' . $fb_app_id . '|' . $ak_secret;
    // Get access token
	$url = 'https://graph.accountkit.com/v1.0/access_token?grant_type=authorization_code&code=' . $_POST["code"] . '&access_token=' . $token;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, $url);
	$result = curl_exec($ch);
	curl_close($ch);
	$info = json_decode($result);
    // Get account information
	$url = 'https://graph.accountkit.com/v1.0/me/?access_token=' . $info->access_token;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, $url);
	$result = curl_exec($ch);
	curl_close($ch);
	$result = json_decode($result);

	echo "<pre>";
	print_r($result);
	echo "<br>";
	echo "https://graph.accountkit.com/v1.0/me/?access_token=";
	echo $info->access_token;
}
?>

<script>
  // initialize Account Kit with CSRF protection
  AccountKit_OnInteractive = function(){
  	AccountKit.init(
  	{
  		appId:1797631263599363, 
  		state:"abcd", 
  		version:"v1.0"
  	}
  	);
  };

  // login callback
        function loginCallback(response) {
            console.log(response);
            if (response.status === "PARTIALLY_AUTHENTICATED") {
                document.getElementById("code").value = response.code;
                document.getElementById("csrf_nonce").value = response.state;
                document.getElementById("my_form").submit();
            }
            else if (response.status === "NOT_AUTHENTICATED") {
                // handle authentication failure
                console.log("Authentication failure");
            }
            else if (response.status === "BAD_PARAMS") {
                // handle bad parameters
                console.log("Bad parameters");
            }
        }
        // phone form submission handler
        function phone_btn_onclick() {
            // you can add countryCode and phoneNumber to set values
            AccountKit.login('PHONE', {}, // will use default values if this is not specified
                    loginCallback);
        }
        // email form submission handler
        function email_btn_onclick() {
            // you can add emailAddress to set value
            AccountKit.login('EMAIL', {}, loginCallback);
        }
        // destroying session
        function logout() {
            document.location = 'logout.php';
        }
    </script>
