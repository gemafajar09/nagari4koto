<?php
$base_url = "http://localhost/nagari4koto/admin";
date_default_timezone_set('Asia/Jakarta');
$server = "localhost";
$user = "root";
$password = "";
$database = "nagari4koto";

$kon = mysqli_connect($server, $user, $password, $database) or die (mysqli_connect_error());
?>
