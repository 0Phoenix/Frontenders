<?php

  //After verifying
  if(isset($_POST["createAuction"])) {
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

  $productName = $conn->real_escape_string($_POST['productName']);
  $productDescription = $conn->real_escape_string($_POST['productDescription']);
  $startprice = $conn->real_escape_string($_POST['startprice']);
  $biddate = $conn->real_escape_string($_POST['biddate']);
  $bidtime = $conn->real_escape_string($_POST['bidtime']);


  if(isset($_POST['anon'])){
    $anon = $conn->real_escape_string($_POST['anon']);
  } else {
    $anon = "No";
  }

  //Add user to the MySQL database
  $sql = "INSERT INTO auction (productName, productDescription, startprice, biddate, bidtime)
  VALUES ('$productName', '$productDescription', '$startprice', '$biddate', '$bidtime')";

  if($conn->query($sql) === TRUE) {
    echo "Auction created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}
?>
