<?php
// NOTE THAT THIS API WONT WORK IN CASE THERE ARE MORE THAN ONE SAME EMAIL IN THE TABLE

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
$query = $mysqli->prepare("Select iduser, first_name, is_admin from users where email = ? AND password = ?");
$query->bind_param("ss", $email, $password);

$query->execute();


$query->store_result();
$num_rows = $query->num_rows;
$query->bind_result($iduser, $first_name, $is_admin);
$query->fetch();
$response = [];
if($num_rows == 0){
  $response["success"] = true;
  $response["response"] = "User Not Found";
}else{
  $response["success"] = true;
  $response["response"] = "Logged in";
  $response["user_id"] = $iduser;
  $response["is_admin"] = $is_admin;
  $response["first_name"] = $first_name;
}
$json = json_encode($response);
echo $json;

?>
