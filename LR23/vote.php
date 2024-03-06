<?php
$vote = $_POST['vote']; // Получаем выбранный вариант ответа

// Считываем текущие результаты голосования из файла
$results = file_get_contents('results.txt');

// Обновляем результаты голосования
$resultsArray = json_decode($results, true);
$resultsArray[$vote]++;

// Сохраняем обновленные результаты в файл
file_put_contents('results.txt', json_encode($resultsArray));

header('Location: index.php'); // Перенаправляем обратно на страницу с голосованием
?>
