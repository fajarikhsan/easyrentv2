<?php 

//Include Configuration File
include('config.php');
include_once("functions.php");
require_once 'easyrent/autoload.php';

$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();


  $email = $data['email'];
  $nama = "{$data['given_name']} {$data['family_name']}";
  $username = "{$data['given_name']}{$data['family_name']}";
  $password = "{$data['given_name']}{$data['family_name']}";
  $upass = "{$data['given_name']}{$data['family_name']}";

  $db = koneksi_db();
  if ($db->connect_errno == 0) {
    $query = "select * from user where email = '$email'";
    $res = $db->query($query);
    if ($res->num_rows == 1) {
      $data = $res->fetch_assoc();
      session_start();
      $_SESSION['email'] = $data['email'];
	  $_SESSION['username'] = $data['username'];
      header("Location: hal-utm.php");
    }
    else {
    	$user = new User($email, $password, $nama, null, $username, $upass);
    	$user->mendaftar();
    	session_start();
      	$_SESSION['email'] = $email;
	  	$_SESSION['username'] = $username;
     	header("Location: hal-utm.php");
    }
  }
}
}