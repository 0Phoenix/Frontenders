<?php
  //starts session
  if(session_status() === PHP_SESSION_NONE){
    session_start();
  }

  //Checks if user is already loggedin
  if(isset($_SESSION['username']) && isset($_SESSION['loggedin'])){
    header("Location: ../Members/searchResults.php");
  }

  //Once user submits
  if(isset($_POST['login'])){
    $conn = new mysqli("localhost", "root", "", "frontyardsale");

    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $data = $conn->query("SELECT username, user_id FROM users WHERE username = '$username' AND password = '$password'");

    //User was found
    if($data->num_rows > 0) {
      $row = mysqli_fetch_array($data);

      $_SESSION['username'] = $username;
      $_SESSION['loggedin'] = 1;
      $_SESSION['user_id'] = $row['user_id'];

      header("Location: ../Members/searchResults.php");
      exit();
    } else {
      echo "Incorrect Username or Password:";
    }

  }?>
