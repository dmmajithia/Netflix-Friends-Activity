<?php
//index.php

if(isSet($_GET['action'])){
	$action = $_GET['action'];
	switch ($action) {
		case 'checkChromeID':
			if(isSet($_GET['chromeID'])){
				$chromeID = $_GET['chromeID'];
				$servername = "localhost";
				$username = "root";
				$password = "grzvE3zXstWz";
				$database = 'netflix_database';

				// Create connection
				//echo "about to create connection\n";
				$conn = mysqli_connect($servername, $username, $password, $database);
				$sql = "SELECT FacebookID, Name FROM users WHERE ChromeID = {$chromeID}";
				$result = mysqli_query($conn, $sql);
				$user['found'] = false; //assuming user not found
				while($row = mysqli_fetch_assoc($result)){
					//we found a user
					echo "hello!";
					//$user = $result->fetch_assoc();
					$user['found'] = true;
					$user['Name'] = $row['Name'];
					$user['FacebookID'] = $row['FacebookID'];
				}
				$response = array(
						'type' => 'message',
						'value' => $user
				);
				$response['request'] = json_decode(stripslashes($_REQUEST['json']), true);
				$encoded = json_encode($response);
				header('Conntent-type: application/json');
				$conn->close();
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				exit($encoded);
			}
			break;
		
		default:
			# code...
			break;
	}
}


?>