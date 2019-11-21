<?php
  //Checks if user put valid date
  function validDate($biddate, $bidtime) {
    $today = date("Y-m-d H:i:s");
    $total_date = $biddate.' '.$bidtime;
    if($today > $total_date) {
      echo "Error: Date must be a future item and date<br><br>";
      return FALSE;
    }
    return TRUE;
  }

  if(session_status() === PHP_SESSION_NONE){
    session_start();
  }

  date_default_timezone_set("America/Chicago");

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
  $status = 'Ongoing';
  $user_id = $_SESSION['user_id'];

  if(validDate($biddate, $bidtime) == TRUE){
    //Add auction to the MySQL database
    $sql = "INSERT INTO auction (name, description, minimumBid, biddate, bidtime, highestbid, highestuser, status, auction_id, owner_id)
    VALUES ('$productName', '$productDescription', '$minimumBid', '$biddate', '$bidtime', NULL, NULL, '$status', NULL, '$user_id')";

    if($conn->query($sql) === TRUE) {
      echo "Auction created successfully";
      $conn->close();
      header("Location: ../Members/searchResults.php");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    }

  $conn->close();
}
?>
