<?php
// for displaying some info about a certain number of restaurants in the home page
//conx
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("connection.php");

//number of restaurants requested
$num = $_GET['num'];


$query = $mysqli->prepare("SELECT restaurant_id, name, address, cuisine FROM restaurants LIMIT $num");
$query->execute();
$array = $query->get_result();
$response = [];


while($toget = $array->fetch_assoc()) {
  $response[] = $toget;
}

$json = json_encode($response);
echo $json;

?>
