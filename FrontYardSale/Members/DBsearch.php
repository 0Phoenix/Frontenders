<html>
<body>

<form action="DBsearch.php" method="post">
<?php

//Gets the auction_id of the item being bid_id
if(isset($_POST['clicked'])){
  $_SESSION['auction_id'] = $row[$_POST['clicked']]['auction_id'];
  echo $_SESSION['auction_id'];
  echo $row[$_POST['clicked']]['auction_id'];
  header("Location: ../CreateBid/bid.php");
}


if(isset($_POST["search"]))
{
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
	if($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect->error);
	}
	echo "Connected Successfully<br>";
	echo $_SESSION['username'];
  echo "<br>";
	$sql = "SELECT name, description, minimumBid, auction_id FROM auction";
	$result = $conn->query($sql);


  $j = 0;
	while ($row[] = mysqli_fetch_array($result)):
		$item_name = $row[$j]['name'];
		$item_des = $row[$j]['description'];
		$item_min = $row[$j]['minimumBid'];
    //echo $row[$j]['auction_id'];



?>

			<br>
			Description: <?php echo $item_des; ?>
			<br>
			Minimum Bid: <?php echo "$" . $item_min; ?> <br>
      <?php echo '<input type="submit" class="btn btn-danger" name="clicked['.$j.']" value='.$item_name.' />'; ?>
      <br>

<?php
  $j = $j + 1;

	endwhile;
}

?>
</form>

</body>
</html>
