<?php
//User selects item to bid on
if(isset($_POST["bidConfirm"]))
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

	$username = $_SESSION['username'];
  echo $_SESSION['username'] . "<br>";
  echo $_SESSION['auction_id'];
  $auction_id = $_SESSION['auction_id'];
  $price = $_POST['price'];

	$sql = "INSERT INTO bid (bid_id, username, auction_id, price) VALUES (NULL, '$username', '$auction_id', '$price')";

  if($result = $conn->query($sql) === TRUE){
    echo "Successfully bid for item";
    header("Location: ../Members/searchResults.php");
  }
}
?>
