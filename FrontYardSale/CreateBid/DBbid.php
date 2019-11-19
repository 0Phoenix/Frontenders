<?php
  //User was found bidding already
  function UserAlreadyBid($conn, $username, $auction_id) {
    $sql= "SELECT username, auction_id, price FROM bid
    WHERE username = '$username' AND auction_id = '$auction_id'";
    //Looks for preivous bids
    $result = $conn->query($sql);

    $data = mysqli_fetch_array($result);
    if($result->num_rows > 0) {
      //If the user already bid for the item
      echo 'You have already bid for this item at the price of $'. $data['price']
      . ".<br>You cannot rebid for this item. <br>Press Cancel Bid to return to the bidding search page.<br>";
      return TRUE;
    }
    return FALSE;
  }

  //checks if user price is enough for min bid
  function checkMinBid($conn, $auction_id, $price) {
    $sql = "SELECT auction_id, minimumBid, name FROM auction
    WHERE auction_id = '$auction_id'";

    $result = $conn->query($sql);
    $data = mysqli_fetch_array($result);

    if($data['minimumBid'] > $price) {
      echo 'The minimun bid for item ' .$data['name']. ' is $' .$data['minimumBid'].
      '.<br>Please enter a price higher than $' .$data['minimumBid'].'.';
      return FALSE;
    }
    return TRUE;
  }

  //Checks if user has higest bid
  function checkHighestBid($conn, $auction_id, $username, $price) {
    $sql = "SELECT auction_id, highestbid FROM auction
    WHERE auction_id = '$auction_id'";

    $result = $conn->query($sql);
    $data = mysqli_fetch_array($result);
    if(!$data){
      echo "Error: ".$conn->error."<br>";
    }

    //Checks for first bidder of the item
    if($price > $data['highestbid']) {
      $sql = "UPDATE auction
      SET highestbid = '$price', highestuser = '$username'
      WHERE auction_id = '$auction_id'";

      //Inserts user into auction table
      if(!($conn->query($sql) === TRUE)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }


  }

  //User selects item to bid on
  if(isset($_POST["bidConfirm"])) {
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

	  $username = $_SESSION['username'];
    $auction_id = $_SESSION['auction_id'];
    $price = $_POST['price'];
    $_SESSION['price'] = $price;
    //Checks if
    if(checkMinBid($conn, $auction_id, $price) == TRUE) {
      //Checks if user already bid
      if(UserAlreadyBid($conn, $username, $auction_id) == FALSE) {
        $sql = "INSERT INTO bid (bid_id, username, auction_id, price)
        VALUES (NULL, '$username', '$auction_id', '$price')";

        if($result = $conn->query($sql) === TRUE) {
          echo "Successfully bid for item";
          header("Location: ../Members/searchResults.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        checkHighestBid($conn, $auction_id, $username, $price);
        header("Location: Successfulbid.php");
      }
    }



  }
?>
