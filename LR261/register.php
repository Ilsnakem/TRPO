<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обработка данных из формы регистрации
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $full_name = $_POST["full_name"];
    $birth_date = $_POST["birth_date"];

    // Защита от SQL-инъекций (лучше использовать подготовленные запросы)
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $email = mysqli_real_escape_string($conn, $email);
    $full_name = mysqli_real_escape_string($conn, $full_name);
    $birth_date = mysqli_real_escape_string($conn, $birth_date);

    // Добавление пользователя в базу данных
    $sql = "INSERT INTO users (username, password, email, full_name, birth_date) 
            VALUES ('$username', '$password', '$email', '$full_name', '$birth_date')";

    if ($conn->query($sql) === TRUE) {
        $response = [
            "success" => true,
            "message" => "Регистрация успешна!"
        ];
        echo json_encode($response);
    } else {
        $response = [
            "success" => false,
            "message" => "Ошибка: " . $conn->error
        ];
        echo json_encode($response);
    }
}

$conn->close();
?>
