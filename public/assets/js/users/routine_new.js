

const addBtn = document.getElementById('plus')
const removeBtn = document.getElementById('minus')
const original = document.querySelector('.add-exercice-container')
const ejercicios = document.getElementById('exercices-list')

let numeroEjercicios = 1

addBtn.addEventListener('click' , () => {
    numeroEjercicios++
    const copia = original.cloneNode(true)
    ejercicios.appendChild(copia)

    
})
removeBtn.addEventListener('click' , () => {
    if(numeroEjercicios > 1) 
    {
            numeroEjercicios--
            ejercicios.lastChild.remove()
    }
    
})