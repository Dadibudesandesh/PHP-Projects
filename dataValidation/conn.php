<?php
$servername="localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password);

$db="CREATE DATABASE IF NOT EXISTS users";

$conn->query($db);
$conn->select_db("users");
?>