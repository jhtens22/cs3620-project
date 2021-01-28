<?php
$servername = "cs3620-jaythan.mysql.database.azure.com";
$username = "jaythanhew@cs3620-jaythan";
$password = "TheseDays17";
$dbname = "cs3620-project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO shows (showid, showtitle)
VALUES (4, 'The Office')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>