

<?php

$db_name = "foodhubdb";
$mysql_user = "root";
$mysql_pass = "";
$server_name = "localhost";

$con = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);

if(!$con){
 echo '{"message":"Unable to connect to the database."}';
}

?>