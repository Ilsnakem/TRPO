<?php
session_start();

$username = "nikita";
$password = "pass";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    if ($input_username == $username && $input_password == $password) {
        $_SESSION['username'] = $username;
        
         //Установка сессии
         $_SESSION['username'] = $username;

         //Установка куки
         setcookie('username', $username, time() + (86400 * 30), "/");
        
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Неверные учетные данные. Попробуйте еще раз.";
    }
}
?>
