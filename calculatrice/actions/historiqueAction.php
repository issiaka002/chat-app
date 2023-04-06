<?php
session_start();
$bdd= new PDO ('mysql:host=127.0.0.1;dbname=quickcal_db;charset=utf8', 'root','');
if(!isset($_SESSION['pseudo'])){
    header('location:connection.php.php');
    exit();
}
?>