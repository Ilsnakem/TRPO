<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="date"] {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="register.php" method="post" onsubmit="return handleFormSubmission()">
        <h2>Регистрация</h2>
        
        <label for="username">Имя пользователя:</label>
        <input type="text" name="username" required>
        
        <label for="full_name">Полное имя:</label>
        <input type="text" name="full_name" required>

        <label for="birth_date">Дата рождения:</label>
        <input type="date" name="birth_date">

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Пароль:</label>
        <input type="password" name="password" required>
        
        <input type="submit" value="Зарегистрироваться">
    </form>

    <script>
        function showPopup(message) {
            alert(message);
        }

        function handleFormSubmission() {
            var form = document.forms[0];
            var formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                showPopup(data.message);
                if (data.success) {
                    // Очистить форму после успешной регистрации
                    form.reset();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showPopup('Произошла ошибка.');
            });

            // Предотвращаем отправку формы через обычный HTTP-запрос
            return false;
        }
    </script>
</body>
</html>
