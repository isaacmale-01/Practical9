<?php
session_start();
include("vendor/autoload.php");
 
$fb = new Facebook\Facebook([
  'app_id' => "458079516007870",
  'app_secret' => '91f5b433b4e2276abc4b8b04397d8782',
  'default_graph_version' => 'v2.10'
]);
 
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email'];
//$loginUrl = $helper->getLoginUrl('https://thefsm.no-ip.org/~james/csc40046/lecture9/facebookphp/fb-callback.php', $permissions);
$loginUrl = $helper->getLoginUrl('https://www.teach.scam.keele.ac.uk/prin/x0s38/Advanced%20Web%20Technologies/MyLoginApp1/facebookphp/fb-callback.php', $permissions);
echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>
