<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Registering OAuth2
OAuth2\Autoloader::register();


class OAuth{
	private $storage = false;
	public $server = false,
		$connect = false,
		$schema = 'oauth',
		$lifetime = 3600,
		$config = false,
		$request = false;

	// initiate data from first time
	public function __construct($d=false, $u=false, $p=false){
		$this->connection($d, $u, $p);
		$this->config = array(
            'client_table' => ($this->schema?$this->schema.'.':'').'oauth_clients',
            'access_token_table' => ($this->schema?$this->schema.'.':'').'oauth_access_tokens',
            'refresh_token_table' => ($this->schema?$this->schema.'.':'').'oauth_refresh_tokens',
            'code_table' => ($this->schema?$this->schema.'.':'').'oauth_authorization_codes',
            'user_table' => ($this->schema?$this->schema.'.':'').'oauth_users',
            'jwt_table'  => ($this->schema?$this->schema.'.':'').'oauth_jwt',
            'jti_table'  => ($this->schema?$this->schema.'.':'').'oauth_jti',
            'scope_table'  => ($this->schema?$this->schema.'.':'').'oauth_scopes',
            'public_key_table'  => ($this->schema?$this->schema.'.':'').'oauth_public_keys'
        );
        // get data from post request
        $this->request = OAuth2\Request::createFromGlobals();
	}

	// for connection
	public function connection($d=false, $u=false, $p=false){
		// $dsn is the Data Source Name for your database, for exmaple "mysql:dbname=my_oauth2_db;host=localhost"

		if($d || $this->connect){
			if(is_array($d) || $this->connect){
				$d = (object) ($this->connect?$this->connect:$d);
				if(isset($d->dsn) && isset($d->username) && isset($d->password)){
					$this->storage = new OAuth2\Storage\Pdo(array('dsn' => $d->dsn, 'username' => $d->username, 'password' => $d->password), $this->config);
				}
			} else
				$this->storage = new OAuth2\Storage\Pdo(array('dsn' => $d, 'username' => $u, 'password' => $p), $this->config);

			if($this->storage){
				// Pass a storage object or array of storage objects to the OAuth2 server class
				$this->server = new OAuth2\Server($this->storage,array(
					'always_issue_new_refresh_token' => true,
					'access_lifetime' => $this->lifetime,
					'refresh_token_lifetime' => $this->lifetime
				));

				// Add the "Client Credentials" grant type (it is the simplest of the grant types)
				$this->server->addGrantType(new OAuth2\GrantType\ClientCredentials($this->storage));

				// Add the "User Credentials" grant type (this is where the oauth magic happens)
				$this->server->addGrantType(new OAuth2\GrantType\UserCredentials($this->storage));

				// Add the "Authorization Code" grant type (this is where the oauth magic happens)
				$this->server->addGrantType(new OAuth2\GrantType\AuthorizationCode($this->storage));

				// for refresh token
				$this->server->addGrantType(new OAuth2\GrantType\RefreshToken($this->storage));

			}

		}
	}

	// check connection
	public function check_connection(){
		if(!$this->storage){
			$this->connection();
		}
	}

	// create new token client id or (client id+user)
	public function client(){
		$this->check_connection();

		if($_POST['grant_type'] === 'password'){
			$this->storage->setClientDetails(isset($_POST['client_id'])?$_POST['client_id']:false, isset($_POST['client_secret'])?$_POST['client_secret']:false, isset($_POST['redirect_url'])?$_POST['redirect_url']:"");
			$this->storage->setUser($_POST['username'], $_POST['password'], isset($_POST['first_name'])?$_POST['first_name']:false, isset($_POST['last_name'])?$_POST['last_name']:false);
		} else if($_POST['grant_type'] === 'client_credentials')
			$this->storage->setClientDetails(isset($_POST['client_id'])?$_POST['client_id']:false, isset($_POST['client_secret'])?$_POST['client_secret']:false, isset($_POST['redirect_url'])?$_POST['redirect_url']:"");
	}

	public function handle(){
		$this->check_connection();

		// Handle a request for an OAuth2.0 Access Token and send the response to the client
		$this->server->handleTokenRequest($this->request)->send();
	}

	public function destroy(){
		$this->check_connection();
		$request = $this->request->request;

		// destroy access_token
		$this->storage->unsetAccessToken($request['access_token']);
		echo json_encode(array('status' => true, 'message' => 'Token was delete.'));
	}

	public function refresh(){
		$this->check_connection();
		$request = $this->request->request;

		// print_r($request); die();
		$this->storage->setAccessToken($request['refresh_token'], $request['client_id'], $request['username'], ($lifetime = strtotime(date("Y-m-d H:i:s", strtotime("+".$this->lifetime." second")))));
		$request['action_token'] = $request['refresh_token'];
		unset($request['refresh_token']);
		unset($request['grant_type']);
		$request['expire_in'] = $this->lifetime;
		ksort($request);
		echo json_encode($request);
	}

	public function validate(){
		$this->check_connection();

		if (!$this->server->verifyResourceRequest($this->request)) {
		    $this->server->getResponse()->send();
		    die;
		}
		echo json_encode(array('success' => true, 'message' => 'You accessed my APIs!'));
	}

	public function build(){
		$sql = array();

		if($this->schema)
			$sql[] = "CREATE SCHEMA ".$this->schema;
        
        $sql[] = "CREATE TABLE {$this->config['client_table']} (
          client_id             VARCHAR(80)   NOT NULL,
          client_secret         VARCHAR(80),
          redirect_uri          VARCHAR(2000),
          grant_types           VARCHAR(80),
          scope                 VARCHAR(4000),
          user_id               VARCHAR(80),
          PRIMARY KEY (client_id)
        )";
        $sql[] = "CREATE TABLE {$this->config['access_token_table']} (
          access_token         VARCHAR(40)    NOT NULL,
          client_id            VARCHAR(80)    NOT NULL,
          user_id              VARCHAR(80),
          expires              DATETIME     DEFAULT(GETDATE()) NOT NULL,
          scope                VARCHAR(4000),
          PRIMARY KEY (access_token)
        )";
        $sql[] = "CREATE TABLE {$this->config['code_table']} (
          authorization_code  VARCHAR(40)    NOT NULL,
          client_id           VARCHAR(80)    NOT NULL,
          user_id             VARCHAR(80),
          redirect_uri        VARCHAR(2000),
          expires             DATETIME     DEFAULT(GETDATE()) NOT NULL,
          scope               VARCHAR(4000),
          id_token            VARCHAR(1000),
          PRIMARY KEY (authorization_code)
        )";
        $sql[] = "CREATE TABLE {$this->config['refresh_token_table']} (
          refresh_token       VARCHAR(40)    NOT NULL,
          client_id           VARCHAR(80)    NOT NULL,
          user_id             VARCHAR(80),
          expires             DATETIME     DEFAULT(GETDATE()) NOT NULL,
          scope               VARCHAR(4000),
          PRIMARY KEY (refresh_token)
        )";
        $sql[] = "CREATE TABLE {$this->config['user_table']} (
          username            VARCHAR(80),
          password            VARCHAR(80),
          first_name          VARCHAR(80),
          last_name           VARCHAR(80),
          email               VARCHAR(80),
          email_verified      BIT,
          scope               VARCHAR(4000)
        )";
        $sql[] = "CREATE TABLE {$this->config['scope_table']} (
          scope               VARCHAR(80)  NOT NULL,
          is_default          BIT,
          PRIMARY KEY (scope)
        )";
        $sql[] = "CREATE TABLE {$this->config['jwt_table']} (
          client_id           VARCHAR(80)   NOT NULL,
          subject             VARCHAR(80),
          public_key          VARCHAR(2000) NOT NULL
        )";
        $sql[] = "CREATE TABLE {$this->config['jti_table']} (
          issuer              VARCHAR(80)   NOT NULL,
          subject             VARCHAR(80),
          audience            VARCHAR(80),
          expires             DATETIME    DEFAULT(GETDATE()) NOT NULL,
          jti                 VARCHAR(2000) NOT NULL
        )";
        $sql[] = "CREATE TABLE {$this->config['public_key_table']} (
          client_id            VARCHAR(80),
          public_key           VARCHAR(2000),
          private_key          VARCHAR(2000),
          encryption_algorithm VARCHAR(100) DEFAULT 'RS256'
        )";
		return $sql;
	}

	public function debug(){
		die();
	}

}