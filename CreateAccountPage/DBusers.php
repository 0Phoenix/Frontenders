<?php

  //After verifying
  if(isset($_POST["createAccount"])) {
  //MySQL server info
  $servername = "localhost";
  $SQLusername = "root";
  $SQLpassword = "";
  $DBname = "users";

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
  $sql = "INSERT INTO users (firstname, lastname, username, email, password, age, gender, anon)
  VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$age', '$gender', '$anon')";

  if($conn->query($sql) === TRUE) {
    echo "Account created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();


}

?>
