<?php
//Adding restaurant by admin, all columns are required
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("./db/connection.php");

// set parameters and execute
// set parameters and execute
if (isset($_POST["name"])){
    $name= $_POST['name'];
}else {
    die("name, is missing");
}
if (isset($_POST["description"])){
    $description= $_POST['description'];
}else {
    die("description, is missing");
}
if (isset($_POST["phone_number"])){
    $phone_number= $_POST['phone_number'];
}else {
    die("phone_number, is missing");
}
if (isset($_POST["vegan_option"])){
    $vegan_option= $_POST['vegan_option'];
}else {
    die("vegan_option, is missing");
}
if (isset($_POST["wifi"])){
    $wifi = $_POST['wifi'];
}else {
    die("wifi, is missing");
}
if (isset($_POST["indoor_seating"])){
    $indoor_seating= $_POST['indoor_seating'];
}else {
    die("indoor_seating, is missing");
}
if (isset($_POST["opening_hr"])){
    $opening_hr= $_POST['opening_hr'];
}else {
    die("opening_hr, is missing");
}
if (isset($_POST["closing_hr"])){
    $closing_hr= $_POST['closing_hr'];
}else {
    die("closing_hr, is missing");
}
if (isset($_POST["address"])){
    $address= $_POST['address'];
}else {
    die("address, is missing");
}
if (isset($_POST["cuisine"])){
    $cuisine= $_POST['cuisine'];
}else {
    die("cuisine, is missing");
}

// prepare and bind
$query = $mysqli->prepare("INSERT INTO restaurants (name, opening_hr, closing_hr, description, vegan_option, phone_number, wifi, indoor_seating, address, cuisine	) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$query->bind_param("ssssisiiss", $name, $opening_hr, $closing_hr, $description , $vegan_option, $phone_number , $wifi , $indoor_seating , $address, $cuisine );

$query->execute();

//response
$response = [];
$response["success"] = true;

echo json_encode($response);
?>





