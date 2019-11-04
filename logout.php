<?php

if(isset($_POST["logout"]))
{
	session_start();
		
	echo $_SESSION['username'];
	
	session_unset();
	
	session_destroy();
	
	header("Location: login.php");
}
?>