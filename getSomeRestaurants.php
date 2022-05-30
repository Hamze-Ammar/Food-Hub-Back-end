<?php
// for displaying some info about a certain number of restaurants in the home page
//conx
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("./db/connection.php");

//number of restaurants requested
if (isset($_GET["num"])){
  $num= $_GET['num'];
}else {
  die("num, is missing");
}

$query = $mysqli->prepare("SELECT restaurant_id, name, address, cuisine FROM restaurants LIMIT ?");
$query->bind_param("i", $num);
$query->execute();
$array = $query->get_result();
$response = [];

while($toget = $array->fetch_assoc()) {
  $response[] = $toget;
}

$json = json_encode($response);
echo $json;

?>
