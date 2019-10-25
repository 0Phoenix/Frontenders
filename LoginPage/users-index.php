<?php
  require 'logincheck.php'
?>
<html>
  <body>
    <?php include '../header.html'; ?>
      Welcome <?php echo $_SESSION['username'] ?>! Ready to bid?
  </body>
<html>
