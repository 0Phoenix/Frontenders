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

  $user_id = $_SESSION['user_id'];

  $sql = "SELECT * FROM users WHERE user_id = '$user_id'";

  $result = $conn->query($sql);

  //Login check
  if($result->num_rows < 0) {
    echo "Error accessing account. Please login again";
    echo 'a type="button" class="btn btn-danger" href="../LoginPage/login">Login</a><br>';
  }

  $row = mysqli_fetch_array($result);

?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <!-- Tell brower to use latest version -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Account Settings</title>

	<!-- Need this to use bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body class="bg-light">
  <div class="page-header">
    <h1 class="display-1 text-center">Account Settings</h1>
  </div> <!-- page-header -->
  <hr>


  <h4>Username: </h4>
  <label for="Basic-Auction"><?php echo $row['username']; ?></label>
  <h4>Email: </h4>
  <label for="Basic-Auction"><?php echo $row['email']; ?></label>
  <h4>Name: </h4>
  <label for="Basic-Auction"><?php echo $row['firstname'].' '.$row['lastname']; ?></label>
  <h4>Age: </h4>
  <label for="Basic-Auction"><?php echo $row['age']; ?></label>
  <hr><br>
  <h3>My Auctions:</h3>
    <?php
      $sql = "SELECT * FROM auction WHERE owner_id = '$user_id'";

      $result = $conn->query($sql);

      //Login check
      if($result->num_rows < 0) {
        echo "You have nothing auctioned currently";
      }
      else {
        while($auc = mysqli_fetch_array($result)):
          echo '
          Item Name: '.$auc['name'].'<br>
          Description: '.$auc['description'].'<br>
          Minimum Bid: $'.$auc['minimumBid'].'<br>
          Auction End Date: '.$auc['biddate'].' '.$auc['bidtime'].'<br>
          Status: '.$auc['status'].'<br>';
          //Shows winner and winning price if auction ended
          if($auc['status'] == 'Ended'){
              if($auc['highestbid'] == NULL) {
                echo 'Nobody Bid for your item :(<br>';
              }
              else {
                echo '
                Winning Price: $'.$auc['highestbid'].'<br>
                Winning User: '.$auc['highestuser'].'<br>';
              }
          }
          echo '<br>';
        endwhile;

      }
      ?>
      <hr>

      <h3>My Bids:</h3>
      <?php
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM bid
        JOIN auction
        ON bid.auction_id = auction.auction_id
        WHERE username = '$username'";

        $result = $conn->query($sql);

        //Checks for bids
        if($result->num_rows < 0) {
          echo "You have no bids currently";
        }
        else {
           while ($row = mysqli_fetch_array($result)):
             echo'
              Item bid on: '.$row['name'].'<br>
              Minimum Price: $'.$row['minimumBid'].'<br>
              Your bid: $'.$row['price'].'<br><br>';
           endwhile;
        }
        ?>






  <br>
  <a href="../Members/searchResults.php" type="button" class="btn btn-danger">Cancel</a>

  <!-- These two need to be at the bottom for some reason -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>
