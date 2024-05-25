
document.getElementById('recipe-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const title = document.getElementById('title').value;
    const ingredients = document.getElementById('ingredients').value;
    const instructions = document.getElementById('instructions').value;

    const recipe = {
        title,
        ingredients,
        instructions
    };

    addRecipeToList(recipe);

    document.getElementById('recipe-form').reset();
});

function addRecipeToList(recipe) {
    const list = document.getElementById('recipe-list');

    const li = document.createElement('li');
    li.innerHTML = `<strong>${recipe.title}</strong><br>Ингредиенты: ${recipe.ingredients}<br>Инструкции: ${recipe.instructions}`;
    
    list.appendChild(li);
}
