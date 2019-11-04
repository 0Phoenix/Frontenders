<?php

//After verifying
if(isset($_POST["login"]))
{
	//MySQL server info
	$servername = "localhost";
	$SQLusername = "root";
	$SQLpassword = "";
	$DBname = "project";

	//Create connection
	$conn = new mysqli($servername, $SQLusername, $SQLpassword, $DBname);

	//Check connection
	if($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect->error);
	}

	echo "Connected Successfully<br>";

	$username = $conn->real_escape_string($_POST['username']);
	$password = $conn->real_escape_string($_POST['password']);

	$sql = "SELECT username FROM userinfo WHERE username = '$username' AND password = '$password'";
	$result = $conn->query($sql);

	if($result->num_rows == 1) 
	{
		echo "Login matched successfully";
		
		// Start the session
		session_start();
		
		$_SESSION['username'] = $username;
		header("Location: searchResults.php");
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

}

?>