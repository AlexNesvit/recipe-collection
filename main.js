// Ожидаем загрузки документа
document.addEventListener("DOMContentLoaded", function() {
    // Плавное появление формы добавления рецепта
    var recipeForm = document.getElementById('recipe-form');
    if (recipeForm) {
        recipeForm.style.opacity = '0';
        setTimeout(function() {
            recipeForm.style.transition = 'opacity 0.5s ease-in-out';
            recipeForm.style.opacity = '1';
        }, 500);
    }
});
