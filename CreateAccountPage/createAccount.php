<!DOCTYPE html>
<html>
  <head>

      <!-- Defines a class for error, color is red -->
      <style>
        .error {color: red;}
      </style>

      <meta charsey="UTF-8">
      <title>Front Yard Sale</title
  </head>
  <body>

    <!--Includes hedaer file-->
    <?php include "../header.html"; ?>

    <?php include 'DBusers.php'; ?>

    <h2>Create Account</h2>

    <span class="error">* required fields</span><br><br>
    <!--User input for account info-->
    <!--Page is send to itself so error messages are printed on same page-->
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
      First name:<br>
      <input type="text" name="firstname"><br>
      Last name:<br>
      <input type="text" name="lastname"><br>
      Username:<br>
      <input type="text" name="username"><br>
      Email:<br>
      <input type="text" name="email"><br>
      Age:<br>
      <input type="number" name="age"><br>
      Gender:<br>
      <input type="radio" name="gender" value="female">Female
      <input type="radio" name="gender" value="male">Male
      <input type="radio" name="gender" value="other">Other<br>
      Create Password:<br>
      <input type="password" name="password"><br>
      Appear Anonymous:<input type="checkbox" name="anon" value="Yes"><br>
      *Note: You can change this in Account Settings<br><br>
      <input type="submit" value="Create Account" name="createAccount">
    </form>


    <?php include "../footer.html"; ?>



  </body>
</html>
