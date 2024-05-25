<?php
$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "cusine";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM recipes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Вывод данных каждой строки
    while($row = $result->fetch_assoc()) {
        echo "<div><h2>" . $row["title"] . "</h2><p><strong>Ингредиенты:</strong> " . $row["ingredients"] . "</p><p><strong>Инструкции:</strong> " . $row["instructions"] . "</p></div><hr>";
    }
} else {
    echo "Рецептов нет";
}
$conn->close();
?>
<a href="index.php">Добавить новый рецепт</a>
