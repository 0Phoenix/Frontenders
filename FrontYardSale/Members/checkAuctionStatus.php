<?php
  if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
  //MySQL server info
  $servername = "localhost";
  $SQLusername = "root";
  $SQLpassword = "";
  $DBname = "frontyardsale";

  //Create connection
  $conn = new mysqli($servername, $SQLusername, $SQLpassword, $DBname);
  //Check connection
  if($conn->connect_error) {
    die("Connection failed: " . $conn->connect->error);
  }

  $sql = "SELECT biddate, bidtime, auction_id, status FROM auction";

  $result = $conn->query($sql);

  while ($row = mysqli_fetch_array($result)) {
    $today = date("Y-m-d H:i:s");
    $item_date = $row['biddate'].' '.$row['bidtime'];

    //Checks if auction is over
    if($today > $item_date) {
      $auction_id = $row['auction_id'];
      //Change status to Ended
      $sql = "UPDATE auction
      SET status = 'Ended'
      WHERE auction_id = '$auction_id'";
    }
  }


  ?>
