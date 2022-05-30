<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("./db/connection.php");


// set parameters and execute
if (isset($_POST["email"])){
  $email= $_POST['email'];
}else {
  die("email, is missing");
}
if (isset($_POST["password"])){
  $password = hash("sha256", $_POST["password"]);
}else {
  die("password, is missing");
}

// Returns iduser, id_admin OR empty array meaning user not found
$query = $mysqli->prepare("Select iduser, is_admin from users where email = ? AND password = ?");
$query->bind_param("ss", $email, $password);

$query->execute();
$array = $query->get_result();
$response = [];


while($toget = $array->fetch_assoc()) {
  $response[] = $toget;
}

$json = json_encode($response);
echo $json;

?>
