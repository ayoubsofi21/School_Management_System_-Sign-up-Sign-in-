<?php
$conn = new pdo("mysql:host=localhost;dbname=php_project", "root", "");

if (!$conn){
    echo("Connection failed: " . mysqli_connect_error());
}
else{
    echo"connected with success";
}
?>