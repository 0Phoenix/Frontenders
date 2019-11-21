<?php

  //After verifying
  if(isset($_POST["createAccount"])) {
  //MySQL server info
  $servername = "localhost";
  $SQLusername = "root";
  $SQLpassword = "";
  $DBname = "frontyardsale";

  //Create connection
  $conn = new mysqli($servername, $SQLusername, $SQLpassword, $DBname);

  //Check connection
  if($conn->connect_error){
    die("Connection failed: " . $conn->connect->error);
  }
    echo "Connected Successfully<br>";

  $firstname = $conn->real_escape_string($_POST['firstname']);
  $lastname = $conn->real_escape_string($_POST['lastname']);
  $username = $conn->real_escape_string($_POST['username']);
  $email = $conn->real_escape_string($_POST['email']);
  $age = $conn->real_escape_string($_POST['age']);
  $gender = $conn->real_escape_string($_POST['gender']);
  $password = $conn->real_escape_string($_POST['password']);

  if(isset($_POST['anon'])){
    $anon = $conn->real_escape_string($_POST['anon']);
  } else {
    $anon = "No";
  }

  //Add user to the MySQL database
  $sql = "INSERT INTO users (firstname, lastname, username, email, password, age, gender, anon, user_id)
  VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$age', '$gender', '$anon', NULL)";

  if($conn->query($sql) === TRUE) {
    echo "Account created successfully";
    session_start();

    $sql = "SELECT user_id FROM users WHERE username = '$username' AND firstname='$firstname' AND lastname='$lastname'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);

    $_SESSION['username'] = $username;
    $_SESSION['loggedin'] = 1;
    $_SESSION['user_id'] = $row['user_id'];

    header("Location: ../Members/searchResults.php");
  } else {
    echo "Error: Creating account <br>" . $conn->error;
  }
  $conn->close();


}

?>
