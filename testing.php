<?php
//include("connection.php");

//conx
$host = "localhost";
$db_user = "root";
$db_pass = null;
$db_name = "foodhubdb";

// Create connection
$mysqli = new mysqli($host, $db_user, $db_pass, $db_name);


$query = $mysqli->prepare("SELECT * FROM restaurants");
$query->execute();
$array = $query->get_result();
$response = [];


while($toget = $array->fetch_assoc()) {
  $response[] = $toget;
}

$json = json_encode($response);
echo $json;

?>
