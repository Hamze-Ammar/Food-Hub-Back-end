<?php
//send pending reviews to admin

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("./db/connection.php");



$query = $mysqli->prepare("SELECT reviews.idreview as ID, reviews.content, 	reviews.rate, reviews.date , users.first_name as User_fname, users.last_name as User_lname, restaurants.name as RestaurantName FROM reviews, users, restaurants WHERE reviews.isPending=1 AND reviews.user_id = users.iduser AND reviews.restaurant_id = restaurants.restaurant_id");

$query->execute();
$array = $query->get_result();
$response = [];


while($toget = $array->fetch_assoc()) {
  $response[] = $toget;
}

$json = json_encode($response);
echo $json;

?>
