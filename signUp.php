<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("./db/connection.php");

// set parameters and execute
if (isset($_POST["first_name"])){
    $first_name= $_POST['first_name'];
}else {
    die("haha, nice try");
}
if (isset($_POST["last_name"])){
    $last_name= $_POST['last_name'];
}else {
    die("haha, nice try");
}
if (isset($_POST["username"])){
    $username= $_POST['username'];
}else {
    die("haha, nice try");
}
if (isset($_POST["email"])){
    $email= $_POST['email'];
}else {
    die("haha, nice try");
}
if (isset($_POST["password"])){
    $password = hash('sha256', $_POST['password']);
}else {
    die("haha, nice try");
}
if (isset($_POST["dob"])){
    $dob= $_POST['dob'];
}else {
    die("haha, nice try");
}
if (isset($_POST["phone_number"])){
    $phone_number= $_POST['phone_number'];
}else {
    die("haha, nice try");
}
if (isset($_POST["gender"])){
    $gender= $_POST['gender'];
}else {
    die("haha, nice try");
}
if (isset($_POST["address"])){
    $address= $_POST['address'];
}else {
    die("haha, nice try");
}


// prepare and bind
$query = $mysqli->prepare("INSERT INTO users (first_name, last_name, username, email, password, dob, phone_number, gender, address	) VALUES (?, ?, ?, ?, ?, ?, ? , ?,? )");
$query->bind_param("sssssssis", $first_name, $last_name, $username, $email , $password, $dob , $phone_number , $gender , $address );

$query->execute();

//response
$response = [];
$response["success"] = true;

echo json_encode($response);

//close conx
$query->close();
$mysqli->close();

?>





