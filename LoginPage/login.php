<html>
  <body>
    <?php include '../header.html' ?>
    <h3>Login</h3>

    <?php
      //starts session
      session_start();

      //Checks if user is already loggedin
      if(isset($_SESSION['username']) && isset($_SESSION['loggedin'])){
        header("Location: users-index.php");
      }

      //Once user submits
      if(isset($_POST['login'])){
        $conn = new mysqli("localhost", "root", "", "users");

        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);

        $data = $conn->query("SELECT username FROM users WHERE username = '$username' AND password = '$password'");

        //User was found
        if($data->num_rows > 0) {
          $_SESSION['username'] = $username;
          $_SESSION['loggedin'] = 1;

          header("Location: users-index.php");
          exit();
        } else {
          echo "Incorrect Username or Password:";
        }

      }?>

    <form action="login.php" method="post">
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
