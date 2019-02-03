<?php
require_once __DIR__ . '/vendor/autoload.php'; // loads required SDKs from Composer. CMD(composer require facebook/graph-sdk)
require_once 'constants.php';
if(!session_id()) {
    session_start();
}
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

function checkChromeID($chromeID){
	$conn = initDatabase();
	$sql = "SELECT FacebookID, Name FROM users WHERE ChromeID = {$chromeID}";
	$result = mysqli_query($conn, $sql);
	$user['found'] = false; //assuming user not found
	while($row = mysqli_fetch_assoc($result)){
		//we found a user
		$user['found'] = true;
		$user['Name'] = $row['Name'];
		$user['FacebookID'] = $row['FacebookID'];
	}
	$conn->close();
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	respond($user);
}

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

/*
constants.php contains - 
	$app_id,
	$app_secret

*/


?>