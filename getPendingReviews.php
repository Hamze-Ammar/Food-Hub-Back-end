<?php
//send pending reviews to admin

include("connection.php");

new mysqli($host, $db_user, $db_pass, $db_name);


$query = $mysqli->prepare("SELECT reviews.content, 	reviews.rate, reviews.date , users.first_name, restaurants.name 
FROM reviews, users, restaurants WHERE reviews.isPending=1 AND reviews.user_id = users.iduser AND reviews.restaurant_id = restaurants.restaurant_id  ");

$query->execute();
$array = $query->get_result();
$response = [];


while($toget = $array->fetch_assoc()) {
  $response[] = $toget;
}

$json = json_encode($response);
echo $json;

?>
