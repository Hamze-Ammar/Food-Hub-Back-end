<?php
// for displaying users for admin

include("connection.php");

new mysqli($host, $db_user, $db_pass, $db_name);


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
