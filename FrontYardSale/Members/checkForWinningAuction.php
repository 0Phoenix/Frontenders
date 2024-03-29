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

  $username = $_SESSION['username'];

  $sql = "SELECT * FROM auction WHERE highestuser = '$username'";

  $result = $conn->query($sql);

  while ($row = mysqli_fetch_array($result)) {
      //Checks if user won the auction
    if($row['highestuser']==$_SESSION['username']) {
      //Checks if auction is over
      if($row['status'] == 'Ended') {
        echo '<h4 class="display-6 text-center">Congratulations! You have won item '.$row['name'].' for $'.$row['highestbid'].'<br>';
        echo '<div class="container>"
                <div class="row">
                  <div class="center">
                    <a type="button" class="btn btn-success" href="transaction.php?auction_id='.$row['auction_id'].'&price='.$row['highestbid'].'">Claim Item</a>
                  </div>
                </div>
              </div></h4><br>';

        if($conn->query($sql) === FALSE) {
          echo 'Database connection error '.$conn->error.'<br>';
        }
      }
    }
  }

?>
