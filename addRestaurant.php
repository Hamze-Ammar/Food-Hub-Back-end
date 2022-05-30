<?php
//Adding restaurant by admin, all columns are required
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("connection.php");

// set parameters and execute
$name= $_POST['name'];
$description= $_POST['description'];
$phone_number=$_POST['phone_number'];
$vegan_option= $_POST['vegan_option'];
$wifi = $_POST['wifi'];
$indoor_seating= $_POST['indoor_seating'];
$opening_hr= $_POST['opening_hr'];
$closing_hr= $_POST['closing_hr'];
$address= $_POST['address'];
$cuisine= $_POST['cuisine'];

// prepare and bind
$query = $mysqli->prepare("INSERT INTO restaurants (name, opening_hr, closing_hr, description, vegan_option, phone_number, wifi, indoor_seating, address, cuisine	) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$query->bind_param("ssssisiiss", $name, $opening_hr, $closing_hr, $description , $vegan_option, $phone_number , $wifi , $indoor_seating , $address, $cuisine );

$query->execute();

//response
$response = [];
$response["success"] = true;

echo json_encode($response);

?>





