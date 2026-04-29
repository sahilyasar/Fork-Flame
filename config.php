<?php
$host = "localhost";
$user = "root";           // default XAMPP user
$pass = "";               // default XAMPP password is empty
$db   = "restaurant_db";  // MUST match database name

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
