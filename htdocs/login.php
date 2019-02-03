<?php
//Netflix Friends Activity
// this page is loaded when user needs to login to facebook
//follow directions from https://developers.facebook.com/docs/php/howto/example_facebook_login

require_once 'functions.php';

$fb = initFB();
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://54.186.219.119/fb-callback.php', $permissions);
$_SESSION["chromeID"] = $_GET["chromeID"];
echo '<script type="text/javascript">window.location.replace(\''. $loginUrl . '\');</script>';

?>
