<?php
$db_name = "foodhubdb";
$mysql_user = "root";
$mysql_pass = "";
$server_name = "localhost";

$conn = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);
$username= $_POST['username'];
$password=$_POST['password'];

$query = "SELECT `username` FROM `users` WHERE `username` = '$username' and password = '$password'";
    $result = $conn->query($query);
    if($result->num_rows > 0) {
      echo json_encode(array('result' => 'success'));
    }else{
   echo json_encode(array('result' => 'failed'));
}
?>