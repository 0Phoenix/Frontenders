<?php
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

	  $sql = "SELECT name, description, minimumBid, biddate, bidtime, auction_id FROM auction";
	  $result = $conn->query($sql);

	  while ($row = mysqli_fetch_array($result)):
		    $item_name = $row['name'];
		    $item_des = $row['description'];
		    $item_min = $row['minimumBid'];
        $item_id =  $row['auction_id'];
        $item_date = $row['biddate'];
        $item_time = $row['bidtime'];

        //$_SESSION['end_time']=$item_date;
        //$_SESSION['start_time']=date("Y-m-d H:i:s");

        echo '<br>
        Item Name: '.$item_name.'<br>
		    Description: '.$item_des.'<br>
			  Minimum Bid: $'.$item_min.'<br>
        Auction End Date: '.$item_date.'<br>
        Auction End Time: '.$item_time.'<br>
        <a type="button" class="btn btn-info" href="../Createbid/bid.php?auction_id='.$item_id.'">Bid on '.$item_name.'</a><br>
        <br>';

    endwhile;
  }

?>
<!--
<script type="text/javascript">
window.location="searchResults.php";
</script>;
-->
