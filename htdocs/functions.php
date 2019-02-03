<?php
require_once __DIR__ . '/vendor/autoload.php'; // loads required SDKs from Composer. CMD(composer require facebook/graph-sdk)
require_once 'constants.php';
if(!session_id()) {
    session_start();
}
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

/*
constants.php contains - 
	$app_id,
	$app_secret

*/


?>