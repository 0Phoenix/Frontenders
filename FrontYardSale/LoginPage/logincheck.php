<?php
if(session_status() === PHP_SESSION_NONE){
  session_start();
}

  if(!isset($_SESSION['username']) || !isset($_SESSION['loggedin'])){
    header("Location: ../LoginPage/login.php");
    exit();
  }
  ?>
