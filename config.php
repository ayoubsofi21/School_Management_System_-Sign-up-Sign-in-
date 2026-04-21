<?php
try {

$conn = new pdo("mysql:host=localhost;dbname=php_project", "root", "");
}catch(PDOException $e){
     echo("Connection failed: " . $e->getMessage());
}

?>