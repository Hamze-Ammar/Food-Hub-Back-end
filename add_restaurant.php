<?php
//include("connection.php");

$host = "localhost";
$db_user = "root";
$db_pass = null;
$db_name = "foodhubdb";

$mysqli = new mysqli($host, $db_user, $db_pass, $db_name);

// set parameters and execute
$name= 			$_GET['name'];
$description= 	$_GET['description'];
$indoor_seating=$_GET['closing_hr'];
$phone_number= 	$_GET['phone_number'];
$vegan_option = $_GET['vegan_option'];
$wifi= 			$_GET['wifi'];
$opening_hr= 	$_GET['opening_hr'];
$closing_hr= 	$_GET['closing_hr'];
$address= 		$_GET['address'];
$cuisine= 		$_GET['cuisine'];

// prepare and bind
$query = $mysqli->prepare("INSERT INTO restaurants (name, opening_hr, closing_hr, description, vegan_option, phone_number, wifi, indoor_seating, address, cuisine	) VALUES (?, ?, ?, ?, ?, ?, ? , ?,?,? )");
$query->bind_param("ssssisiiss",             $name, $opening_hr, $closing_hr, $description , $vegan_option, $phone_number , $wifi , $indoor_seating , $address, $cuisine );

$query->execute();

//response
$response = [];
$response["success"] = true;

echo json_encode($response);
echo ('ymkn meshe lhal');

//close conx
$query->close();
$mysqli->close();

?>





