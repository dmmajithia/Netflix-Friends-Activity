<?php
//Netflix Friends Activity
// this page is loaded when user needs to login to facebook
//follow directions from https://developers.facebook.com/docs/php/howto/example_facebook_login

require_once 'functions.php';

$fb = new Facebook\Facebook([
  'app_id' => '2196118380706308', // Replace {app-id} with your app id
  'app_secret' => '45e8d6c72c0b8d59543bb7b5b519679c',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://54.186.219.119/fb-callback.php', $permissions);

echo '<script type="text/javascript">window.location.replace(\''. htmlspecialchars($loginUrl) . '\');</script>';

?>