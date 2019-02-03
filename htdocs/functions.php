<?php
require_once 'utilities.php';

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

function createUser($chromeID, $facebookID, $fbAccessToken){
	
}
/*
constants.php contains - 
	$app_id,
	$app_secret

*/


?>