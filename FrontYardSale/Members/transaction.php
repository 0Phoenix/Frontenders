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
  $auction_id = $_GET['auction_id'];

  $sql = "SELECT * FROM auction WHERE auction_id = '$auction_id'";
  $row = mysqli_fetch_array($conn->query($sql));

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Transaction</title>
  </head>
  <body>
    <!-- adds space around text, enlarge text inside it, and underline it -->
    <div class="page-header">
      <h1 class="display-1 text-center">Front Yard Sale Transaction</h1>
    </div> <!-- page-header -->
    <hr>

    <h4>Final Price of <?php echo $row['name'].' is $'.$row['highestbid']; ?> </h4><br>
   <!-- Card Holder Name -->
    <label for="Basic-Auction">Enter card holder name</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
      </div>
      <input type="text" class="form-control" id="Basic-Auction" aria-describedby="basic-addon3" required>
    </div>

    <!-- Card Number -->
    <label for="Basic-Auction">Enter credit card number</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
      </div>
      <input type="text" class="form-control" id="Basic-Auction" aria-describedby="basic-addon3" required>
    </div>

    <!-- Expiration Date -->
    <label for="Basic-Auction">Enter Date (MM/YY)</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
      </div>
      <input type="text" class="form-control" id="Basic-Auction" aria-describedby="basic-addon3" required>
    </div>

    <!-- CVC -->
    <label for="Basic-Auction">CVC (---)</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
      </div>
      <input type="text" class="form-control" id="Basic-Auction" aria-describedby="basic-addon3" required>
    </div>



      <!-- A button to confirm choices -->
      <a type="button" class="btn btn-danger"href="SuccessfulTransaction.php?auction_id=<?php echo $row['auction_id'];?>">Confirm</a>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
