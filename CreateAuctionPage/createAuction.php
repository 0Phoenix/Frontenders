<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Create Auction</title>
  </head>
  <body>

  <?php include 'DBauction.php'; ?>

  <form action="createAuction.php" method="post" role="form">
   <!-- Auction Title -->
    <label for="Basic-Auction">Enter product title</label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
      </div>
      <input type="text" class="form-control" name="Basic-Auction" aria-describedby="basic-addon3" name="productName" required>
    </div>

    <!-- Auction Description -->
    <label for="Basic-Auction">Enter product description</label>
    <div class="input-group">
        <div class="input-group-prepend">
        </div>
        <textarea class="form-control" aria-label="Auction Description" name="productDescription" required></textarea>
      </div>

    <!-- Auction Price -->
    <label for="Basic-Auction">Enter starting bname price</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">$</span>
          <span class="input-group-text">0.00</span>
        </div>
        <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" name="startprice" required>
      </div>

    <!-- Auction Time-Period -->
    <label for="Basic-Auction">Enter time-period for bid</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Date and Time</span>
        </div>
        <input type="text" aria-label="Date" class="form-control" name="biddate" required>
        <input type="text" aria-label="Time" class="form-control" name="bidtime" required>
      </div>

    <!-- Auction Photo -->
    <label for="Basic-Auction">Enter a photo of item</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" name="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>

      <!-- A button to confirm choices -->
      <input type="submit" class="btn btn-danger" name="createAuction" value="Confirm">
    </form>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
