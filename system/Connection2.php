<?php
	$server = "localhost";
	$dbUser = "root";
	$dbPass = "Kahlis@7355608Fernanda0467";
	$dbName = "u720205887_blink";

	$conn = mysqli_connect($server, $dbUser, $dbPass, $dbName);

	if(!$conn)
	{
		$response['status'] = "failure: ".mysqli_connect_error;
	}
?>