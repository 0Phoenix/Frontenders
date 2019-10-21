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
<?php include "header.html"; ?>

<?php
  //User class
  class User {
    private $firstname;
    private $lastname;
    private $age;
    private $password;
    private $gender;
    private $anon;

      function __constuct($afirstname, $alastname, $aage, $apassword, $agender, $aanon){
        $this->firstname = $afirstname;
        $this->lastname = $alastname;
        $this->age = $aage;
        $this->password = $apassword;
        $this->gender = $agender;
        $this->anon = $aanon;
        echo "New User Created<br>";
      }

      //Getters
      function getFirstname(){
        return $this->firstname;
      }
      function getLastname(){
        return $this->lastname;
      }
      function getAge(){
        return $this->age;
      }
      function getPassowrd(){
        return $this->password;
      }

      function getGender(){
        return $this->gender;
      }
      function getAnon(){
        return $this->anon;
      }
    }

//define variables to empty values
$firstname = $lastname = $username = $age = $password = $gender = $anon = "";
$firstnameErr = $lastnameErr = $usernameErr = $ageErr = $passwordErr = $genderErr = "";
//Trims data and add user and checks required fields
if($_SERVER["REQUEST_METHOD"] == "POST")
{

  if(empty($_POST["firstname"])) {
    $firstnameErr = "First Name is required";
  }
  else {
    $firstname = test_input($_POST["firstname"]);

    //Checks if name is only letters and whitespace
    if(!preg_match("/^[a-zA-Z]*$/", $firstname)) {
      $firstnameErr = "Only letters and whitespace allowed";
    }
  }

  if(empty($_POST["lastname"])) {
    $lastnameErr = "Last Name is required";
  }
  else {
    $lastname = test_input($_POST["lastname"]);

    if(!preg_match("/^[a-zA-Z]*$/", $lastname)) {
      $lastnameErr = "Only letters and whitespace allowed";
    }
  }

  if(empty($_POST["username"])) {
    $usernameErr = "User Name is required";
  }
  else {
    $username = test_input($_POST["username"]);

    if(!preg_match("/^[a-zA-Z]*$/", $username)) {
      $usernameErr = "Only letters and whitespace allowed";
    }
  }

  if(empty($_POST["age"])) {
    $ageErr = "Age is required";
  }
  else {
    $age = test_input($_POST["age"]);
  }

  if(empty($_POST["password"])) {
    $passwordErr = "Password is requried";
  }
  else {
    $password = test_input($_POST["password"]);
  }

  if(empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  }
  else{
    $gender = $_POST['gender'];
  }
  //Optional field
  if(!empty($_POST["anon"])) {
    $anon = test_input($_POST["anon"]);
  }

}
//  $user = new User($firstname, $lastname, $age, $password, $gender, $anon);

  /*echo "Your first name is " . $user->getFirstname() . "<br>";
  echo "and lastname is " . $user->getLastname() . "<br>";
  echo "Your age is " . $user->getAge() . "<br>";*/

//Trim data function
function test_input($data){
  $data = trim($data); //Get rid of whitespace
  $data = stripslashes($data); //Get rid of backslashes
  $data = htmlspecialchars($data); //Prevents special characters from hacking through html injection
}


?>

<h2>Create an Account</h2>

  <span class="error">* required fields</span><br><br>
  <!--User input for account info-->
  <!--Page is send to itself so error messages are printed on same page-->
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
  First name:<br>
  <input type="text" name="firstname">
  <span class="error">* <?php echo $firstnameErr; ?></span><br> <!--Error message if field is null -->
  Last name:<br>
  <input type="text" name="lastname">
  <span class="error">* <?php echo $lastnameErr; ?></span><br>
  Username:<br>
  <input type="text" name="username">
  <span class="error">* <?php echo $usernameErr; ?></span><br>
  Age:<br>
  <input type="number" name="age">
  <span class="error">* <?php echo $ageErr; ?></span><br>
  Gender:<br>
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr; ?></span><br>
  Create Password:<br>
  <input type="password" name="password">
  <span class="error">* <?php echo $passwordErr; ?></span><br><br>
  Appear Anonymous:<input type="checkbox" name="anon" value="Yes"><br>
  *Note: You can change this in Account Settings<br><br>
  <input type="submit" value="submit">
</form>


<?php include "footer.html"; ?>

<?php 
//MySQL server info
$servername = "localhost";
$SQLusername = "root";
$SQLpassword = "";
$DBname = "users";

//Create connection
$conn = new mysqli($servername, $SQLusername, $SQLpassword, $DBname);

//Check connection
if($conn->connect_error){
  die("Connection failed: " . $conn->connect->error);
}
echo "Connected Successfully<br>";
?>

</body>
</html>
