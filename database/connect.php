<?php

$hostname = "us-cdbr-east-05.cleardb.net";
$username = "b0b06195c36870";
$db_password = "fc4da8d8";
$db_name = "heroku_5bc15b752937d12";


$conn = mysqli_connect($hostname, $username, $db_password, $db_name) or die ("could not connect");

?>