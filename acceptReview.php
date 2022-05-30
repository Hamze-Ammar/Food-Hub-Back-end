<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
include("./db/connection.php");

// set parameters and execute
if (isset($_POST["idreview"])){
    $idreview= $_POST['idreview'];
}else {
    die("Id was not received");
}


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





