<?php
// for displaying users for admin

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("./db/connection.php");


$query = $mysqli->prepare("SELECT iduser, first_name, last_name, username, email, dob, phone_number, picture, gender, address FROM users");
$query->execute();
$array = $query->get_result();
$response = [];


while($toget = $array->fetch_assoc()) {
  $response[] = $toget;
}

$json = json_encode($response);
echo $json;

?>
