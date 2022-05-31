<?php
// for displaying only One restaurant and its rate

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("./db/connection.php");

// set parameters and execute
if (isset($_POST["restaurant_id"])){
  $restaurant_id= $_POST['restaurant_id'];
}else {
  die("restaurant_id, is missing");
}

$query = $mysqli->prepare("SELECT R.restaurant_id, R.name, R.opening_hr, R.closing_hr, R.description, R.vegan_option, R.phone_number, R.wifi, R.indoor_seating, R.address, R.cuisine, ROUND(SUM(V.rate)/COUNT(V.rate), 1) as rate FROM restaurants R, reviews V WHERE v.restaurant_id = ? AND R.restaurant_id =?");
$query->bind_param("ii", $restaurant_id, $restaurant_id);
$query->execute();
$array = $query->get_result();
$response = [];


while($toget = $array->fetch_assoc()) {
  $response[] = $toget;
}

$json = json_encode($response);
echo $json;
?>
