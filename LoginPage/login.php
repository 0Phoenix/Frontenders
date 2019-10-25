<!DOCTYPE html>
<html>
  <body>
    <?php include '../header.html' ?>
    <h3>Login</h3>

    <form action="submitLogin.php" method="post">
	     Username:<br>
	     <input type="text" name="username">
	     <br>
	     Password:<br>
	     <input type="password" name="password">
	     <br><br>
	     <input type="submit" value="Login" name="login">
    </form>

</body>
</html>
