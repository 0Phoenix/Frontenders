<?php
if(session_status() === PHP_SESSION_NONE){
  session_start();
}
?>

<!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Transaction successful</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>

      <h1 class="display-1 text-center">Success Buying Item</h1>
      <h3 class="display-6 text-center">Click Continue Bidding to return to item searching</h3>
      <a type="button" class="btn btn-danger"href="../Members/searchResults.php"><center>Continue Bidding</center></a>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
  </html>

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

  $sql = "UPDATE auction
  SET status = 'Complete'
  WHERE auction_id = '$auction_id'";

  if($conn->query($sql) === FALSE){
      echo "Connection error $conn->error";
  }
?>
