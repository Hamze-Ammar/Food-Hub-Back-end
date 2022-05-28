<?php
//include("connection.php");

$host = "localhost";
$db_user = "root";
$db_pass = null;
$db_name = "foodhubdb";

$mysqli = new mysqli($host, $db_user, $db_pass, $db_name);

// set parameters and execute
$firstname= $_POST['first_name'];
$lastname= $_POST['last_name'];
$username= $_POST['username'];
$email= $_POST['email'];
$password = hash('sha256', $_POST['password']);
$dob= $_POST['dob'];
$phone_number= $_POST['phone_number'];
$gender= $_POST['gender'];
$address= $_POST['address'];

// prepare and bind
$query = $mysqli->prepare("INSERT INTO users (first_name, last_name, username, email, password, dob, phone_number, gender, address	) VALUES (?, ?, ?, ?, ?, ?, ? , ?,? )");
$query->bind_param("sssssssis", $firstname, $lastname, $username, $email , $password, $dob , $phone_number , $gender , $address );

$query->execute();

//response
$response = [];
$response["success"] = true;

echo json_encode($response);
//echo ('<h1>ymkn meshe lhal</h1>');
//close conx
$query->close();
$mysqli->close();

?>





