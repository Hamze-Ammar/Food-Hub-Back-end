<?php
// for displaying restaurants  and the admin page with their rates

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("./db/connection.php");

//new mysqli($host, $db_user, $db_pass, $db_name);


$query = $mysqli->prepare("SELECT R.restaurant_id, R.name, R.opening_hr, R.closing_hr, R.description, R.vegan_option, R.phone_number, R.wifi, R.indoor_seating, R.address, R.cuisine, ROUND(SUM(V.rate)/COUNT(V.rate), 1) as rate FROM restaurants R, reviews V WHERE v.restaurant_id = R.restaurant_id GROUP BY R.restaurant_id");
$query->execute();
$array = $query->get_result();
$response = [];


while($toget = $array->fetch_assoc()) {
  $response[] = $toget;
}

$json = json_encode($response);
echo $json;

?>
