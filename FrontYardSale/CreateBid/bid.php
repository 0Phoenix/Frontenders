<!doctype html>
<html lang="en">
  <?php include "DBbid.php";
  if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
  if(isset($_GET['auction_id'])){
    $_SESSION['auction_id'] = $_GET['auction_id'];
  }


  ?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Create Bid</title>
  </head>
  <body>
  <div class="page-header">
    <h1 class="display-1 text-center">Bid Page</h1>
  </div> <!-- page-header -->
 <!-- DISPLAY IMAGE & DESCRIPTION OF PRODUCT -->

<form action="bid.php" method="post" role="form">
    <!-- Enter Bid -->
    <label for="Basic-Auction">Enter bid </label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">$</span>
          <span class="input-group-text">0.00</span>
        </div>
        <input type="text" class="form-control" name="price" aria-label="Dollar amount (with dot and two decimal places)" required>
      </div>


      <!-- A button to confirm choices -->
      <input type="submit" class="btn btn-danger" name="bidConfirm" value="Confirm">
</form>

<a href="../Members/searchResults.php" type="button" class="btn btn-danger">Cancel Bid</a>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
