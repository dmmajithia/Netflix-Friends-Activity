<?php
require_once __DIR__ . '/vendor/autoload.php'; // loads required SDKs from Composer. CMD(composer require facebook/graph-sdk)
require_once 'constants.php';
if(!session_id()) {
    session_start();
}

/*
constants.php contains - 
	$app_id,
	$app_secret

*/


?>