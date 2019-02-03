<?php
//index.php
require_once 'functions.php';
if(isSet($_GET['action'])){
	$action = $_GET['action'];
	switch ($action) {
		case 'checkChromeID':
			if(isSet($_GET['chromeID'])){
				$chromeID = $_GET['chromeID'];
				checkChromeID($chromeID);
			}
			break;
		
		default:
			# code...
			break;
	}
}


?>