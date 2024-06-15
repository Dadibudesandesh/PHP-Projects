
<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
$db = "CREATE DATABASE IF NOT EXISTS warriors";
$createDb = mysqli_query($conn, $db);
$conn->select_db("warriors");
?>