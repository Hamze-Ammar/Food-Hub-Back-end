<?php
include("connection.php");


// set parameters and execute
$content        = $_GET['content'];
$rate           = $_GET['rate'];
$date           = $_GET['date'];
$user_id        = $_GET['user_id'];
$restaurant_id  = $_GET['restaurant_id'];
//ispending is set to default true '1'

// prepare and bind
$query = $mysqli->prepare("INSERT INTO reviews (content, rate, date, user_id, restaurant_id) VALUES (?, ?, ?, ?, ?)");
$query->bind_param("sisii", $content, $rate, $date, $user_id , $restaurant_id);

$query->execute();

//response
$response = [];
$response["success"] = true;

echo json_encode($response);

//close conx
$query->close();
$mysqli->close();

?>





