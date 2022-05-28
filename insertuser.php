<?php
// include("connection.php"); 
// require 'connection.php'; 
$db_name = "foodhubdb";
$mysql_user = "root";
$mysql_pass = "";
$server_name = "localhost";

$conn = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);

$firstname= $_POST['firstname'];
$lastname=$_POST['lastname'];
$sql = "INSERT INTO students (first_name, last_name) VALUES ('$firstname', '$lastname')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>