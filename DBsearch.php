<?php

if(isset($_POST["search"]))
{	

	//MySQL server info
	$servername = "localhost";
	$SQLusername = "root";
	$SQLpassword = "";
	$DBname = "project";

	//Create connection
	$conn = new mysqli($servername, $SQLusername, $SQLpassword, $DBname);

	//Check connection
	if($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect->error);
	}

	echo "Connected Successfully<br>";

	echo $_SESSION['username'];

	$sql = "SELECT name, description, minimumBid FROM iteminfo";
	$result = $conn->query($sql);
	
	while ($row = mysqli_fetch_array($result)):
		$item_name = $row['name'];
		$item_des = $row['description'];
		$item_min = $row['minimumBid'];
		$output = "Item Name: $item_name <br> Item Description: $item_des <br> Minimum Bid: #item_min";
?>
	<html>
	<body>
		<p>
			<form action="searchResults.php" method="post">
			<input type="submit" class="btn btn-danger" name="bid" value=<?php echo $item_name; ?>>
			<br>
			Description: <?php echo $item_des; ?>
			<br>
			Minimum Bid: <?php echo $item_min; ?>
			</form>
		</p>
	</body>
	</html>
<?php
	endwhile;
}
?>
