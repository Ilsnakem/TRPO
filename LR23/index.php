<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Голосование</title>
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

        h1, h2 {
            color: #333;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        input[type="radio"] {
            margin-bottom: 10px;
            display: inline-block;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #6A5ACD;
        }

        /* Результаты голосования */
        .results {
            text-align: center;
        }

        .results table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        .results th, .results td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .results th {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Голосование за лучшую группу ПЗТ в колледже</h1>
    <h2>Выберите вариант ответа:</h2>
    <form action="vote.php" method="post">
        <label><input type="radio" name="vote" value="ПЗТ-34"> ПЗТ-34</label>
        <label><input type="radio" name="vote" value="ПЗТ-35"> ПЗТ-35</label>
        <label><input type="radio" name="vote" value="ПЗТ-36"> ПЗТ-36</label>
        <label><input type="radio" name="vote" value="ПЗТ-37"> ПЗТ-37</label>
        <label><input type="radio" name="vote" value="ПЗТ-38"> ПЗТ-38</label>
        <label><input type="radio" name="vote" value="ПЗТ-39"> ПЗТ-39</label>
        <label><input type="radio" name="vote" value="ПЗТ-40"> ПЗТ-40</label>
        <label><input type="radio" name="vote" value="ПЗТ-41"> ПЗТ-41</label><br>
        <input type="submit" value="Голосовать">
    </form>

    <h2>Результаты голосования:</h2>
    <div class="results">
        <?php 
            $results = file_get_contents('results.txt');
            $resultsArray = json_decode($results, true);
            echo "<ul>";
            foreach ($resultsArray as $option => $count) {
                echo "<li>$option: $count голосов</li>";
            }
            echo "</ul>"; 
        ?>
    </div>
</body>
</html>
