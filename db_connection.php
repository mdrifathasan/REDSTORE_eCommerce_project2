<?php
$host = "localhost";
$user = "root";
$password = "";
$db_name = "users1";

$connection = mysqli_connect($host, $user, $password, $db_name);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
