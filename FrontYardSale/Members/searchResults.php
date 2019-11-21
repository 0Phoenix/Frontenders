<?php
  require '../LoginPage/logincheck.php';
  require 'checkAuctionStatus.php';
  if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <!-- Tell brower to use latest version -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Search For items</title>

	<!-- Need this to use bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
  <!-- database library -->


  <!-- div class ="container-fluid" can make things go out of bounds -->
  <div class="d-flex justify-content-between">
    <div>
      <a type="button" class="btn btn-primary" href="../CreateAuctionPage/createAuction.php">Create Auction</a>
    </div>
      <br><br>
    <div>
      <a type="button" class="btn btn-danger" href="logout.php">Logout</a>
    </div>
  </div> <!-- container -->


  <!-- adds space around text, enlarge text inside it, and underline it -->
  <div class="page-header">
    <h1 class="display-1 text-center">Front Yard Sale Auctions</h1>
  </div> <!-- page-header -->

  <?php echo '<h3 class="display-6 text-center">Welcome '.$_SESSION['username'].'</h3><br>';
        require 'checkForWinningAuction.php';
      ?>
  <div class="input-group mb-3">
    <div class="input-group-prepend">

      <form action="searchResults.php" method="post">

        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="item">
        <input type="submit" class="btn btn-primary" name="search" value="Search">
      </form>

    </div>
  </div>


  <?php include 'DBsearch.php'; ?>

<!-- These two need to be at the bottom for some reason -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</body>
</html>
