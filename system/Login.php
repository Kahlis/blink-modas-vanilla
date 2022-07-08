<?php
require("Connection.php");
session_start();

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$user = $_POST["user"];

$password = "";
if(isset($_POST["pass"])) {
	$password = md5($_POST["pass"]);
}

$session = "";
if(isset($_POST["session"])) {
	$session = $_POST["session"];
}

if (mysqli_connect_errno()) {
    $response = "Connect failed: ". mysqli_connect_error();
    exit();
}

$query = "SELECT * FROM users WHERE email = '$user'";
if($rs = mysqli_query($conn, $query))
{
    if(mysqli_num_rows($rs) > 0)
    {
    	if($row = mysqli_fetch_array($rs, MYSQLI_ASSOC))
    	{
			if($session != "" && $row["session"] == $session) {
				$response['status'] = "success";
				$response['sessionID'] = $session;
				$response['ID'] = $row['ID'];
				$response['user'] = $row['email'];

				$_SESSION["local_user"] = $row['email'];
			} else {
				if($row["password"] == $password) {
					$newSession = generateRandomString(7);
					$query2 = "UPDATE users SET session = '$newSession' WHERE ID = " . $row["ID"];
					if($rs2 = mysqli_query($conn, $query2)) {
						$response['status'] = "success";
						$response['sessionID'] = $newSession;
						$response['ID'] = $row['ID'];
						$response['user'] = $row['email'];

						$_SESSION["local_user"] = $row['email'];
						$_SESSION["mySessionID"] = $newSession;
					} else {
						$response['status'] = "error";
						$response['error'] = "could not create the session";
					}
				}
				else {
					$response['status'] = "error";
					$response['error'] = "user_password_doesnt_match";
				}
			}
    	}
    	else
    	{
    		$response['status'] = "error";
    		$response['error'] = "database_connect_error";
    	}
    }
    else
    {
		$response['status'] = "error";
		$response['error'] = "user_not_found";
    }
}
else
{
	$response['status'] = "error";
	$response['error'] = "database_connect_error";
}

echo json_encode($response);
?>