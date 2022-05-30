<?php
// for displaying restaurants in the home page and the admin page

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("./db/connection.php");

//new mysqli($host, $db_user, $db_pass, $db_name);


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
