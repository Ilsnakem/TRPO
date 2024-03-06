<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подписка на рассылку</title>
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

        input[type="checkbox"] {
            margin-right: 8px;
            transform: translateY(2px);
        }

        input[type="email"] {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 16px;
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
    <form action="subscribe.php" method="post" onsubmit="return handleFormSubmission()">
        <h2>Подписка на рассылку</h2>
        <label>Выберите пункты для подписки:</label>
        <label><input type="checkbox" name="items[]" value="Новости"> Новости</label>
        <label><input type="checkbox" name="items[]" value="Акции"> Акции</label>
        <label><input type="checkbox" name="items[]" value="Специальные предложения"> Специальные предложения</label>
        <br>
        <label for="email">Ваш email:</label>
        <input type="email" name="email" required>
        
        <input type="submit" value="Подписаться">
    </form>

    <script>
    function showPopup(message, additionalMessage) {
        alert(message);
        if (additionalMessage) {
            alert(additionalMessage);
        }
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
            showPopup(data.message, data.additionalMessage);
            if (data.success) {
                // Очистить форму или выполнить другие действия после успешной подписки
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
