<?php

require("Connection.php");

$user = $_GET["user"];
$email = $_GET["email"];
$password = md5($_GET["pass"]);

if (mysqli_connect_errno()) {
    $response['status'] = "error";
    $response['error'] = "Connect failed: ". mysqli_connect_error();
    exit();
}

$query = "SELECT user_name FROM users WHERE user_name = '$user'";

if($rs = mysqli_query($conn, $query))
{
    $row = mysqli_num_rows($rs);
	if($row > 0)
	{
		$response['status'] = "error";
		$response['error'] = "user_exists";
		echo json_encode($response);
		return;
	}
}
else
{
	$response['status'] = "error";
	$response['error'] = mysqli_connect_errnor();
	echo json_encode($response);
	return;
}

$query = "SELECT user_email FROM users WHERE user_email = '$email'";

if($rs = mysqli_query($conn, $query))
{
    $row = mysqli_num_rows($rs);
	if($row > 0)
	{
		$response['status'] = "error";
		$response['error'] = "email_exists";
		echo json_encode($response);
		return;
	}
}
else
{
	$response['status'] = "error";
	$response['error'] = mysqli_connect_errnor();
	echo json_encode($response);
	return;
}

$query = "INSERT INTO users VALUES ('', '$user', '$email','$password', '')";

if($rs = mysqli_query($conn, $query))
{
	$response['status'] = "success";
}
else
{	
	$response['status'] = "error";
	$response['error'] = mysqli_error($conn);
}

echo json_encode($response);

?>