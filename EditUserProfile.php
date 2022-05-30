<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("./db/connection.php");

// First we store the user's id that has been reveived
if (isset($_POST["user_id"])){
    $user_id= $_POST['user_id'];
}else {
    die("user_id, is missing");
}

// Get the already saved user profile from our db
$old_version = $mysqli->prepare("SELECT iduser, first_name, last_name , username , email , password , dob , phone_number , gender , address FROM users WHERE iduser = ?");
$old_version->bind_param("i", $user_id);
$old_version->execute();
$old_version->store_result();
$num_rows = $old_version->num_rows;
$old_version->bind_result($iduser, $first_name, $last_name ,  $username ,  $email ,  $password ,  $dob ,  $phone_number ,  $gender , $address );
$old_version->fetch();

// Now that we have the old values we can proceed 
// Lets see what has been sent from the front and update the variables
if (isset($_POST["first_name"])){
    $first_name= $_POST['first_name'];
}
if (isset($_POST["last_name"])){
    $last_name= $_POST['last_name'];
}
if (isset($_POST["username"])){
    $username= $_POST['username'];
}
if (isset($_POST["email"])){
    $email= $_POST['email'];
}
if (isset($_POST["password"])){
    $password= hash('sha256', $_POST['password']);
}
if (isset($_POST["dob"])){
    $dob= $_POST['dob'];
}
if (isset($_POST["phone_number"])){
    $phone_number= $_POST['phone_number'];
}
if (isset($_POST["gender"])){
    $gender= $_POST['gender'];
}
if (isset($_POST["address"])){
    $address= $_POST['address'];
}

// prepare and bind the new values
$query = $mysqli->prepare("UPDATE users SET first_name=?, last_name=?, username=?, email=?, password=? , dob=?, phone_number=?, gender=?, address=?  WHERE iduser= ?");
$query->bind_param("sssssssisi", $first_name, $last_name, $username, $email , $password, $dob , $phone_number , $gender , $address, $user_id );

$query->execute();

//response
$response = [];
$response["success"] = true;

echo json_encode($response);

//close conx
$query->close();
$mysqli->close();

?>