<?php 
    session_start();
    if(!isset($_SESSION['email'])){
        header('location:login.php');
        exit();
       }
    $email=$_SESSION['email'];
    echo "Welcom ".$email;
?>