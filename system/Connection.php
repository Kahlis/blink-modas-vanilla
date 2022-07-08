<?php
	$server = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "blink_database";

	$conn = mysqli_connect($server, $dbUser, $dbPass, $dbName);

	if(!$conn)
	{
		$response['status'] = "failure: ".mysqli_connect_error;
	}
?>