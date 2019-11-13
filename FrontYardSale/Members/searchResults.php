<?php require '../LoginPage/logincheck.php'; ?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />

	<!-- Tell brower to use latest version -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Search Page</title>

	<!-- Need this to use bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<!-- database library -->
<!--<?php //include 'DBSearch.php'; ?>-->

<!-- div class ="container-fluid" can make things go out of bounds -->
<div class="container">

<!-- adds space around text, enlarge text inside it, and underline it -->
<div class="page-header">
<h1>Search Results</h1>
</div> <!-- page-header -->

<?php include 'logout.php';
	if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
	echo $_SESSION['username'] . "<br>";
?>

<form action="searchResults.php" method="post">
  <input type="submit" class="btn btn-danger" name="logout" value="Logout">
</form>

<br><br>


<form action="searchResults.php" method="post">
  <input type="submit" class="btn btn-danger" name="createAuction" value="Create Auction">
</form>
<?php if(isset($_POST["createAuction"])) {
  header("Location: ../CreateAuctionPage/createAuction.php");
} ?>

<br><br>

<form action="searchResults.php" method="post">
  <input type="submit" class="btn btn-danger" name="search" value="Search">
</form>

<!-- Search Results -->
<?php include 'DBsearch.php'; ?>


</div> <!-- container -->

<!-- These two need to be at the bottom for some reason -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</body>
</html>