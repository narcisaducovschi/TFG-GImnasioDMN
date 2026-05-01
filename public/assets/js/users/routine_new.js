const addBtn = document.getElementById('plus');
const removeBtn = document.getElementById('minus');
const ejerciciosContainer = document.getElementById('exercices-list');

addBtn.addEventListener('click', () => {
    const original = document.querySelector('.add-exercice-container');
    const copia = original.cloneNode(true);

    const inputs = copia.querySelectorAll('input, textarea');
    inputs.forEach(input => input.value = '');

    ejerciciosContainer.appendChild(copia);
});

removeBtn.addEventListener('click', () => {
    const todosLosEjercicios = document.querySelectorAll('.add-exercice-container');
    
    if (todosLosEjercicios.length > 1) {
        ejerciciosContainer.lastElementChild.remove();
    }
});