<?php
include("connection.php");
header("Access-Control-Allow-Origin:*");

// set parameters and execute
$user_id = $_POST['user_id'];
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
$query = $mysqli->prepare("UPDATE users SET first_name=?, last_name=?, username=?, email=?, password=? , dob=?, phone_number=?, gender=?, address=?  WHERE iduser= ?");
$query->bind_param("sssssssisi", $firstname, $lastname, $username, $email , $password, $dob , $phone_number , $gender , $address, $user_id );

$query->execute();

//response
$response = [];
$response["success"] = true;

echo json_encode($response);

//close conx
$query->close();
$mysqli->close();

?>