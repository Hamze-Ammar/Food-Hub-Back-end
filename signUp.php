<?php
include("connection.php");


$firstname= $_POST['first_name'];
$lastname= $_POST['last_name'];
$username= $_POST['username'];
$email= $_POST['email'];
$password= $_POST['password'];
$dob= $_POST['dob'];
$phone_number= $_POST['phone_number'];
$gender= $_POST['gender'];
$address= $_POST['address'];


$query = $mysqli->prepare("INSERT INTO users (first_name, last_name, username, email, password, dob, phone_number, gender, address	)
 VALUES (?, ?, ?, ?, ?, ?, ? , ?, ?)");
$query->bind_param("sssssssis", $firstname, $lastname, $username, $email , $password, $dob , $phone_number , $gender , $address );
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);


// $sql = "INSERT INTO users (first_name, last_name, username, email, password, dob, phone_number, gender, address	) 
// VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$dob', '$phone_number', '$gender', '$address' )";

// if ($conn->query($sql) === TRUE) {
  // echo "New record created successfully";
// } else {
  // echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
?>





