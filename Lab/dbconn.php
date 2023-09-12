<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "cluas";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Cannot connect to the database: " . mysqli_connect_error());
}


?>
