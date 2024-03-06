<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP скрипты</title>
</head>
<body>

<?php
//вывод инф-ции о разработчике
    echo "<h1>Привет всем!\nРазработал данный скрипт Никита</h1>";
?>

<?php
//задаем переменные цвет, размер и фио
    $color = 'green';
    $size = '51px';
    $fio = 'Фурман Никита';

    //вывод текста 
    echo "<p style='color: $color; font-size: $size;'>$fio</p>";
?>

<?php
    //создание константы 
    define ("NUM_E", 2.71828);
    //вывод текста
    echo "<p>Число е равно ", NUM_E,"</p>";

    //Присваивание переменной значение константы 
    $num_e1 = NUM_E;

    //вывод типа переменной  $num_e1
    echo "Тип переменной num_e1 равно: ",gettype($num_e1), "<br>";
    echo "<p>";

    //последовательное изсенение типа переменной
    $num_e1 = "2.71828"; //string
    echo "Значение переменной num_e1: ",$num_e1, " Тип переменной: ", gettype($num_e1),"<br>";

    $num_e1 = 12; //int
    echo "Значение переменной num_e1: ",$num_e1, " Тип переменной: ", gettype($num_e1), "<br>";
    
    $num_e1 =true; //bolean
    echo "Значение переменной num_e1: ",$num_e1, " Тип переменной: ", gettype($num_e1), "<br>";
    echo "<p>";
?> 

<?php
    //создание предопределенных констант 
    echo "Предопределенные константы:<br>";
    echo "Значение константы PHP_VESION:".PHP_VERSION."<br>";
    echo "Значение константы PHP_VESION:".PHP_OS."<br>";

    //предопределенные переменные
    echo "Информация о сервере с помощью предопределенной константы: <br>"; //SERVER
    echo $_SERVER['HTTP_USER_AGENT'];
?>

<?php
    //вывод информации о версии PHP
    echo phpinfo();
?>
</body>
</html>

