<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Если используется сессия
    header("Location: loginform.php");

     //Если используются куки
    if(!isset($_COOKIE['username'])) {
  header("Location: loginform.php");
  die();
 }
}

$username = $_SESSION['username'] ?? $_COOKIE['username'];

echo "Добро пожаловать, $username!";
?>
