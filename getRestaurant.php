<?php
//when a user click on a specific restaurant -> send all columns

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("./db/connection.php");


// set parameters and execute
if (isset($_POST["restaurant_id"])){
  $restaurant_id= $_POST['restaurant_id'];
}else {
  die("restaurant_id, is missing");
}

// prepare and bind
$query = $mysqli->prepare("SELECT * FROM restaurants WHERE restaurant_id= ? ");
$query->bind_param("i", $restaurant_id);

$query->execute();
$array = $query->get_result();
$response = [];

while($toget = $array->fetch_assoc()) {
  $response[] = $toget;
}

$json = json_encode($response);
echo $json;

?>
