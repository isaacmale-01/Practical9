<?php
session_start();

if(!isset($_SESSION['facebook_access_token'])){
	header("Location: login.php");
	exit;
}

include("vendor/autoload.php");
$fb = new Facebook\Facebook([
  'app_id' => "458079516007870",
  'app_secret' => '91f5b433b4e2276abc4b8b04397d8782',
  'default_graph_version' => 'v2.10',
  'default_access_token' => $_SESSION['facebook_access_token']
  ]);

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,email');
  
  $user = $response->getGraphUser();
  
  echo 'Name: '. $user['name'];
  //var_dump($user);
  
  echo "<br>".'Email: '. $user['email'];
  //var_dump($user);
  
  echo "<p><a href='logout.php'>Logout</a></p>";
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

?>
