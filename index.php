<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $ingredients = $_POST['ingridients'];
    $instructions = $_POST['instructions'];

    // Подключение к базе данных
    $servername = "localhost:8889";
    $username = "root";
    $password = "root";
    $dbname = "cusine";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO recipes (title, ingridients, instructions) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $ingridients, $instructions);

    if ($stmt->execute()) {
        echo "Новый рецепт успешно добавлен";
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

