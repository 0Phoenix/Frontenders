<head>
<style>
table {
	font-family:ariel, sans-serif;
	border-collapse: collapse;
	width: 100%;
}

td, th {
	border: 1px solid #dddddd;
	text-align: left;
	padding: 8px;
}

tr:nth-child(even) {
	background-color: #dddddd;
}
</style>
</head>
<?php
$x=$_POST['firstname'];
$y=$_POST['lastname'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db1";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

//This is MySQL. PHP is talking to the database
$sql = "INSERT INTO `user` (`fname`, `lname`) VALUES ('$x',' $y')";

if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

//Query to the database
$sql = "SELECT id, fname, lname FROM user";
$result = $conn->query($sql);

//Checks the number of rows
if ($result->num_rows > 0) {
	//outputs dta of each row
	echo "<table>";
	while($row = $result->fetch_assoc()) {
		echo "<tr><td> id: " . $row["id"]. " </td><td> Name: " . $row["fname"]. " " . $row["lname"]. "</td></tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}

$conn->close();
?>