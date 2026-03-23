$(document).ready(function () {
    $('#loginForm').on('submit', function (e) {
        let isValid = true;

        // 1. Limpiar estados previos
        $('.error-text').hide().text('');
        $('input').removeClass('invalid');

        // 2. Validar Email
        const email = $('#email').val().trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email === "") {
            showError('#email', '#error-email', 'El correo es obligatorio.');
            isValid = false;
        } else if (!emailRegex.test(email)) {
            showError('#email', '#error-email', 'Formato de correo no válido.');
            isValid = false;
        }

        // 3. Validar Contraseña
        const password = $('#password').val().trim();
        if (password === "") {
            showError('#password', '#error-password', 'La contraseña es obligatoria.');
            isValid = false;
        } else if (password.length < 6) {
            showError('#password', '#error-password', 'Mínimo 6 caracteres.');
            isValid = false;
        }

        // 4. Bloquear envío si hay errores
        if (!isValid) {
            e.preventDefault(); 
            return false; 
        }
    });

    function showError(inputSid, errorSid, message) {
        $(inputSid).addClass('invalid');
        $(errorSid).text(message).show();
    }
});