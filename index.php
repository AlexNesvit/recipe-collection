<?php
// Определение текущего языка
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'ru';

// Определение текстовых строк на русском и французском языках
$texts = array(
    'ru' => array(
        'title' => "Добро пожаловать в мою кулинарную книгу",
        'placeholder_title' => "Название рецепта",
        'placeholder_ingridients' => "Ингредиенты",
        'placeholder_instructions' => "Инструкции",
        'button_text' => "Добавить рецепт"
    ),
    'fr' => array(
        'title' => "Bienvenue sur mon livre de recettes",
        'placeholder_title' => "Nom de la recette",
        'placeholder_ingridients' => "Ingrédients",
        'placeholder_instructions' => "Instructions",
        'button_text' => "Ajouter une recette"
    )
);

// Установка текстовых строк для текущего языка
$title = $texts[$lang]['title'];
$placeholder_title = $texts[$lang]['placeholder_title'];
$placeholder_ingredients = $texts[$lang]['placeholder_ingridients'];
$placeholder_instructions = $texts[$lang]['placeholder_instructions'];
$button_text = $texts[$lang]['button_text'];
?>

<!DOCTYPE html>
<html lang="<?php echo $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="lang-switch">
            <a href="?lang=ru">Русский</a> | <a href="?lang=fr">Français</a>
        </div>
        <h1><?php echo $title ?></h1>
        <form id="recipe-form" method="post" action="save-recipe.php">
            <input type="text" id="title" name="title" placeholder="<?php echo $placeholder_title ?>" required>
            <textarea id="ingridients" name="ingridients" placeholder="<?php echo $placeholder_ingredients ?>" required></textarea>
            <textarea id="instructions" name="instructions" placeholder="<?php echo $placeholder_instructions ?>" required></textarea>
            <button type="submit"><?php echo $button_text ?></button>
        </form>
        <h2>Список рецептов</h2>
        <ul id="recipe-list"></ul>
    </div>
    <script src="main.js"></script>
</body>
</html>

