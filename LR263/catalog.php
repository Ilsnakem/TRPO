<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог продукции</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    h2 {
        color: #333;
    }

    form {
        margin-bottom: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    form label,
    form select,
    form input {
        margin-bottom: 10px;
        padding: 0.7rem;
        margin-left: 10px;
    }

    form input[type="submit"] {
        background-color: #3498db; /* Измените цвет по вашему выбору */
        color: white;
        border: none;
        padding: 8px;
        border-radius: 4px;
        cursor: pointer;
    }

    form input[type="submit"]:hover {
        background-color: #4caf50; /* Измените цвет по вашему выбору */
    }

    .product {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        width: 300px;
    }

    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 20px 0;
    }

    .pagination a {
        margin-right: 10px;
        text-decoration: none;
        color: #333;
        border: 1px solid #ccc;
        padding: 5px 10px;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .pagination a.active {
        background-color: #4caf50;
        color: white;
    }
    .product img {
    max-width: 100%; /* Уменьшит размер изображения до максимальной ширины контейнера */
    height: auto; /* Сохранит соотношение сторон */
    }
</style>

</head>
<body>
    <h2>Каталог продукции</h2>

    <form action="" method="get">
        <label for="search">Поиск:</label>
        <input type="text" name="search" placeholder="Введите ключевое слово">
        <label for="sort">Сортировка:</label>
        <select name="sort">
            <option value="name">По названию</option>
            <option value="price">По цене</option>
        </select>
        <label for="category">Фильтр по категории:</label>
        <select name="category">
            <option value="" selected>Все категории</option>
            <option value="Электроника">Электроника</option>
            <option value="Одежда">Одежда</option>
            <option value="Книги">Книги</option>
        </select>
        <input type="submit" value="Применить">
    </form>

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

    // Определение текущей страницы для пагинации
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $items_per_page = 3; // Количество элементов на странице

    // Вычисление смещения для выборки данных
    $offset = ($current_page - 1) * $items_per_page;

    // Подготовка переменных для поиска, сортировки и фильтрации
    $search_query = isset($_GET['search']) ? $_GET['search'] : '';
    $sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'name';
    $category_filter = isset($_GET['category']) ? $_GET['category'] : '';

    // Формируем условие для сортировки и фильтрации
    $condition = "WHERE (name LIKE '%$search_query%' OR description LIKE '%$search_query%')";
    if ($category_filter) {
        $condition .= " AND category = '$category_filter'";
    }

    // Запрос к базе данных для выборки продукции с учетом сортировки и фильтрации
    $sql = "SELECT * FROM products1 $condition ORDER BY $sort_by LIMIT $offset, $items_per_page";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Выводим данные каждого продукта
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product">';
            if (!empty($row["image_path"])) {
                echo '<img src="' . htmlspecialchars($row["image_path"]) . '" alt="Продукт">';
            }
            echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
            echo '<p>Категория: ' . htmlspecialchars($row["category"]) . '</p>';
            echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
            echo '<p>Цена: $' . number_format($row["price"], 2) . '</p>';
            echo '</div>';
        }

        // Создаем ссылки для пагинации
        $total_items_sql = "SELECT COUNT(*) as total FROM products1 $condition";
        $total_items_result = $conn->query($total_items_sql);
        $total_items = $total_items_result->fetch_assoc()['total'];
        $total_pages = ceil($total_items / $items_per_page);

        echo '<div class="pagination">';
        for ($i = 1; $i <= $total_pages; $i++) {
            $active_class = ($i == $current_page) ? 'active' : '';
            echo '<a class="' . $active_class . '" href="?page=' . $i . '&search=' . $search_query . '&sort=' . $sort_by . '&category=' . $category_filter . '">' . $i . '</a>';
        }
        echo '</div>';
    } else {
        echo '<p>Нет продукции.</p>';
    }

    $conn->close();
    ?>
</body>
</html>
