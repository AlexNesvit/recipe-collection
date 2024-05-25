// Ожидаем загрузки документа
document.addEventListener("DOMContentLoaded", function() {
    // Плавное появление формы добавления рецепта
    var recipeForm = document.getElementById('recipe-form');
    if (recipeForm) {
        recipeForm.style.opacity = '0';
        setTimeout(function() {
            recipeForm.style.transition = 'opacity 3.5s ease-in-out';
            recipeForm.style.opacity = '1';
        }, 500);
    }
});

$(document).ready(function() {
    // Обработчик формы для отправки данных
    $('#recipe-form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: 'save-recipe.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert('Рецепт успешно добавлен!');
                loadRecipes();
            },
            error: function() {
                alert('Ошибка при добавлении рецепта.');
            }
        });
    });

    // Функция для загрузки рецептов
    function loadRecipes() {
        $.ajax({
            url: 'list-recipes.php',
            type: 'GET',
            success: function(data) {
                $('#recipe-list').html(data);
            },
            error: function() {
                alert('Ошибка при загрузке рецептов.');
            }
        });
    }

    // Загрузка рецептов при загрузке страницы
    loadRecipes();
});

