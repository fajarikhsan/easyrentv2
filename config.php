<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('20257848732-gmsrs18n7k5kq64pmplpii4bdi90oc4g.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('_ez0J9qEHSLONw4Z5LLMTnUp');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/easyrentv2/login-google.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>