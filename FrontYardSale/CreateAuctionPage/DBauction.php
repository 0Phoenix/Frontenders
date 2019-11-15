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
    //echo "Connected Successfully<br>";

  $productName = $conn->real_escape_string($_POST['productName']);
  $productDescription = $conn->real_escape_string($_POST['productDescription']);
  $minimumBid = $conn->real_escape_string($_POST['startprice']);
  $biddate = $conn->real_escape_string($_POST['biddate']);
  $bidtime = $conn->real_escape_string($_POST['bidtime']);

  //Add user to the MySQL database
  $sql = "INSERT INTO auction (name, description, minimumBid, biddate, bidtime, highestbid, highestuser, auction_id)
  VALUES ('$productName', '$productDescription', '$minimumBid', '$biddate', '$bidtime', NULL, NULL, NULL)";

  if($conn->query($sql) === TRUE) {
    echo "Auction created successfully";
    header("Location: ../Members/searchResults.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }



  $conn->close();
}
?>
