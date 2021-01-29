<?php
$servername = "cs3620-jaythan.mysql.database.azure.com";
$username = "jaythanhew@cs3620-jaythan";
$password = "TheseDays17";
$dbname = "cs3620-project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$con=mysqli_init(); mysqli_ssl_set($con, NULL, NULL, "/var/www/html/BaltimoreCyberTrustRoot.crt.pem", NULL, NULL); 
mysqli_real_connect($con, "cs3620-jaythan.mysql.database.azure.com", "jaythanhew@cs3620-jaythan", "TheseDays17", "cs3620-project", 3306);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO shows (showid, showtitle)
VALUES (4, 'Queens Gambit')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>