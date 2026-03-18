document.addEventListener('DOMContentLoaded', () => {
    const pesoInput = document.getElementById('imc-peso-input');
    const alturaInput = document.getElementById('imc-altura-input');
    const calcularBtn = document.getElementById('calcular-imc-btn');
    const resultadoDiv = document.getElementById('imc-result');

    // Función para calcular IMC
    function calcularIMC(peso, altura) {
        const alturaM = altura / 100; // Convertir cm a metros
        return peso / (alturaM * alturaM);
    }

    // Función para clasificar IMC
    function clasificarIMC(imc) {
        if (imc < 18.5) return 'Peso inferior al normal';
        if (imc >= 18.5 && imc < 25) return 'Peso normal';
        if (imc >= 25 && imc < 30) return 'Peso superior al normal';
        return 'Obesidad';
    }

    // Evento click en el botón
    calcularBtn.addEventListener('click', () => {
        const peso = parseFloat(pesoInput.value);
        const altura = parseFloat(alturaInput.value);

        // Validar inputs
        if (!peso || peso <= 0) {
            resultadoDiv.textContent = 'Por favor ingresa un peso válido.';
            return;
        }
        if (!altura || altura <= 0) {
            resultadoDiv.textContent = 'Por favor ingresa una altura válida.';
            return;
        }

        const imc = calcularIMC(peso, altura);
        const clasificacion = clasificarIMC(imc);

        resultadoDiv.innerHTML = `
            Tu IMC es <strong>${imc.toFixed(2)}</strong><br>
            Clasificación: <strong>${clasificacion}</strong>
        `;
    });
});