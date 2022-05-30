<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("connection.php");

// set parameters and execute
$idreview = $_GET['idreview'];

// prepare and bind
$query = $mysqli->prepare("UPDATE reviews SET reviews.isPending ='0' WHERE idreview=? ");
$query->bind_param("s", $idreview );

$query->execute();

//response
$response = [];
$response["success"] = true;

echo json_encode($response);

//close conx
$query->close();
$mysqli->close();

?>





