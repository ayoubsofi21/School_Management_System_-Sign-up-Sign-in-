<?php
try {

$conn = new pdo("mysql:host=localhost;dbname=php_project", "root", "");
echo"connected with success";
}catch(PDOException $e){
     echo("Connection failed: " . $e->getMessage());
}

?>