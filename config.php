<?php
$conn = new pdo("mysql:host=localhost;dbname=php_project", "root", "");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>