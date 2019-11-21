<?php
  date_default_timezone_set("America/Chicago");

  if(isset($_POST["search"])) {
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
	  //echo "Connected Successfully<br>";

	  $sql = "SELECT * FROM auction";
	  $result = $conn->query($sql);

    //$today=('Y-m-d H:i:s', timezone_open('America/Chicago'));

	  while ($row = mysqli_fetch_array($result)):
        //Does not print items the user auctioned
        if($row['owner_id'] != $_SESSION['user_id']) {
          $item_name = $row['name'];
  		    $item_des = $row['description'];
  		    $item_min = $row['minimumBid'];
          $item_id =  $row['auction_id'];
          $item_date = $row['biddate'];
          $item_time = $row['bidtime'];
          $item_date = $item_date.' '.$item_time;

          echo '<br>
          Item Name: '.$item_name.'<br>
		      Description: '.$item_des.'<br>
			     Minimum Bid: $'.$item_min.'<br>
          Auction End Date: '.$item_date.'<br>';
          $today = date("Y-m-d H:i:s");
          //echo"$today $item_date";

          if($today > $item_date) {
              echo '<button class="btn btn-outline-secondary" type="button" id="button-addon1">This Auction has Ended</button>';
          } else {
              echo'<a type="button" class="btn btn-info" href="../Createbid/bid.php?auction_id='.$item_id.'&item_name='.$item_name.'&minBid='.$item_min.'">
              Bid on '.$item_name.'</a><br>';
          }
          echo '<br>';
        }
    endwhile;
  }

?>
<!--
<script type="text/javascript">
window.location="searchResults.php";
</script>;
-->
