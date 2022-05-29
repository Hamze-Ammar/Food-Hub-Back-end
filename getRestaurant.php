<?php
//when a user click on a specific restaurant -> send all columns

include("connection.php");
header("Access-Control-Allow-Origin:*");

// set parameters and execute
$name= $_GET['name'];

// prepare and bind
$query = $mysqli->prepare("SELECT * FROM restaurants WHERE name= ? ");
$query->bind_param("s", $name);

$query->execute();
$array = $query->get_result();
$response = [];

while($toget = $array->fetch_assoc()) {
  $response[] = $toget;
}

$json = json_encode($response);
echo $json;

?>
