<?php 
	$hostName = "localhost";
	$dbUser = "root";
	$dbPassword = "";
	$dbName = "diary_login";
	try{
		$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
	}
	catch(Exception $e){
		echo "Connection to database failed.<br>".$e->getMessage();
		die();
	}
	
?>