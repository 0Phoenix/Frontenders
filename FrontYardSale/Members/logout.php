<?php
	if(session_status() === PHP_SESSION_NONE){
    session_start();
  }

	echo $_SESSION['username'];

	session_unset();

	session_destroy();

	header("Location: ../");

?>
