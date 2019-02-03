<?php
/*
utilities.php
This where utility functions reside.
Those functions are - 
	1. initDatabase() - initialiazes a connection to MySQL. RETURNS - mysqli connection
	2. respond(JSON value) - sends a response back to API caller. Does not return. Exits.
	3. initFB() - initialiaze Facebook object. RETURNS - Facebook object.
*/

require_once __DIR__ . '/vendor/autoload.php'; // loads required SDKs from Composer. CMD(composer require facebook/graph-sdk)
require_once 'constants.php';
if(!session_id()) {
    session_start();
}
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

function initDatabase(){ //returns $conn from 'mysqli_connect()''
	$servername = "localhost";
	$username = "root";
	$password = "grzvE3zXstWz";
	$database = 'netflix_database';

	// Create connection
	//echo "about to create connection\n";
	$conn = mysqli_connect($servername, $username, $password, $database);
	return $conn;
}

function respond($value = {}){ //send back response to API caller
	$response = array(
			'type' => 'message',
			'value' => $value
	);
	$response['request'] = json_decode(stripslashes($_REQUEST['json']), true);
	$encoded = json_encode($response);
	header('Conntent-type: application/json');
	exit($encoded);
}

function initFB(){
	$fb = new Facebook\Facebook([
	'app_id' => '2196118380706308', // Replace {app-id} with your app id
	'app_secret' => '45e8d6c72c0b8d59543bb7b5b519679c',
	'default_graph_version' => 'v2.2',
	]);
	return $fb;
}

?>