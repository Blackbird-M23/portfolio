<?php 
$db_host = "localhost";
$db_name = "portfolio";
$db_pass = "";
$db_user = "root";

$connecction = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$connecction){
    die("Connection failed: " . mysqli_connect_error());
}

?>