<?php
//MySQL server info
$servername = "localhost";
$SQLusername = "root";
$SQLpassword = "";
$DBname = "frontyardsale";

//Create connection
$conn = new mysqli($servername, $SQLusername, $SQLpassword, $DBname);

//Check connection
if($conn->connect_error){
  die("Connection failed: " . $conn->connect->error);
}

//Create our MySQLDatabase
$sql = "CREATE DATABASE IF NOT EXISTS frontyardsale";
if($conn->query($sql) === TRUE) {
  //echo "Tables created<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



//Create user table
$sql = "CREATE TABLE IF NOT EXISTS `frontyardsale`.`users` ( `firstname` TEXT NOT NULL , `lastname` TEXT NOT NULL , `username` TEXT NOT NULL ,
`email` TEXT NOT NULL , `password` TEXT NOT NULL , `age` INT NOT NULL , `gender` TEXT NOT NULL , `anon` TEXT NOT NULL ) ENGINE = InnoDB";

if($conn->query($sql) === TRUE) {
  //echo "Tables created<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Create auction table
$sql = "CREATE TABLE IF NOT EXISTS `frontyardsale`.`auction` ( `name` TEXT NOT NULL , `description` TEXT NOT NULL , `minimumBid` INT NOT NULL ,
`biddate` DATE NOT NULL , `bidtime` TIME NOT NULL , `highestbid` FLOAT NULL DEFAULT NULL , `highestuser` INT NULL DEFAULT NULL,
`auction_id` INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(`auction_id`)) ENGINE = InnoDB";

if($conn->query($sql) === TRUE) {
  //echo "Tables created<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Create bid table
$sql = "CREATE TABLE IF NOT EXISTS `frontyardsale`.`bid` ( `bid_id` INT NOT NULL AUTO_INCREMENT, `username` TEXT NOT NULL ,
`auction` INT NOT NULL , `price` FLOAT NOT NULL , PRIMARY KEY (`bid_id`)) ENGINE = InnoDB;";
if($conn->query($sql) === TRUE) {
  //echo "Tables created<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
