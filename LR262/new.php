<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .news-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .news-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .news-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="news-container">
        <h2>Последние новости</h2>

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

        // Запрос к базе данных для получения новостей
        $sql = "SELECT id, title, content, date_published FROM news ORDER BY date_published DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Выводим данные каждой новости
            while ($row = $result->fetch_assoc()) {
                echo '<div class="news-item">';
                echo '<h3>' . htmlspecialchars($row["title"]) . '</h3>';
                echo '<p>' . nl2br(htmlspecialchars($row["content"])) . '</p>';
                echo '<p><small>Опубликовано: ' . $row["date_published"] . '</small></p>';
                echo '</div>';
            }
        } else {
            echo '<p>Нет новостей.</p>';
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
