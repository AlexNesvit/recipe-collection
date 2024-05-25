<?php
header('Content-Type: application/json');
$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "cusine";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $ingredients = $conn->real_escape_string($_POST['ingredients']);
    $instructions = $conn->real_escape_string($_POST['instructions']);

    $sql = "INSERT INTO recipes (title, ingredients, instructions) VALUES ('$title', '$ingredients', '$instructions')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Новый рецепт успешно добавлен!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Ошибка: ' . $sql . '<br>' . $conn->error]);
    }
}

$conn->close();
?>