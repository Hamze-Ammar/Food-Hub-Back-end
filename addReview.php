<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("./db/connection.php");


// set parameters and execute
if (isset($_POST["content"])){
    $content= $_POST['content'];
}else {
    die("content, is missing");
}
if (isset($_POST["rate"])){
    $rate= $_POST['rate'];
}else {
    die("rate, is missing");
}
if (isset($_POST["user_id"])){
    $user_id= $_POST['user_id'];
}else {
    die("user_id, is missing");
}
if (isset($_POST["restaurant_id"])){
    $restaurant_id= $_POST['restaurant_id'];
}else {
    die("restaurant_id, is missing");
}
// 'ispending' is set to default '1' in database

// Get time
$today = date('Y-m-d');

// prepare and bind
$query = $mysqli->prepare("INSERT INTO reviews (content, rate, date, user_id, restaurant_id) VALUES (?, ?, ?, ?, ?)");
$query->bind_param("sisii", $content, $rate, $today, $user_id , $restaurant_id);

$query->execute();

//response
$response = [];
$response["success"] = true;

echo json_encode($response);

//close conx
$query->close();
$mysqli->close();
?>

