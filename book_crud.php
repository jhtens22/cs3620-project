<?php

session_start();

$servername = "cs3620-jaythan.mysql.database.azure.com";

$username = (isset($_SESSION["SQLUSER"]) ? $_SESSION["SQLUSER"] : $_ENV['SQLUSER']);
$password = (isset($_SESSION["SQLPW"]) ? $_SESSION["SQLPW"] : $_ENV['SQLPW']);
$dbname = "cs3620-project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$insert_book = "INSERT INTO books (bookid, booktitle, bookauthor)
VALUES (1, 'Paper Towns', 'John Green')";

if ($conn->query($insert_book) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $insert_book . "<br>" . $conn->error;
}

$get_book = "SELECT bookid, booktitle, bookauthor FROM books";
$show_book = $conn->query($get_book);

if ($show_book->num_rows > 0) {
  // output data of each row
  while($row = $show_book->fetch_assoc()) {
    echo "id: " . $row["bookid"]. " - Title: " . $row["booktitle"]. " - Author: " . $row["bookauthor"]. "<br>";
  }
} else {
  echo "0 results";
}

$delete_book = "DELETE FROM books WHERE bookid=1";

if ($conn->query($delete_book) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close(); 

?>