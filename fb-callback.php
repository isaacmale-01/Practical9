<?php
include("vendor/autoload.php");

session_start();
 
$fb = new Facebook\Facebook([
  'app_id' => "458079516007870",
  'app_secret' => '91f5b433b4e2276abc4b8b04397d8782',
  'default_graph_version' => 'v2.10',
]);
 
$helper = $fb->getRedirectLoginHelper();
 
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  //echo 'Graph returned an error: ' . $e->getMessage();
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  //echo 'Facebook SDK returned an error: ' . $e->getMessage();
}
 
if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;
  
} elseif ($helper->getError()) {
  // The user denied the request
}
header('Location: members.php');
?>
