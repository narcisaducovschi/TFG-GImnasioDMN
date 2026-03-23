$(document).ready(function () {
    $('#registerForm').on('submit', function (e) {
        let isValid = true;

        // 1. Limpiar estados previos
        $('.error-text').hide().text('');
        $('input').removeClass('invalid');

        // 2. Validar que todos los campos estén llenos
        $(this).find('input').each(function() {
            if ($(this).val().trim() === "") {
                showError('#' + $(this).attr('id'), `Este campo es obligatorio.`);
                isValid = false;
            }
        });

        // 3. Validación específica de Código Postal (Exactamente 5 dígitos)
        const cp = $('#codigo_postal').val().trim();
        const cpRegex = /^\d{5}$/; // Expresión regular para exactamente 5 números

        if (cp !== "" && !cpRegex.test(cp)) {
            showError('#codigo_postal', 'El código postal debe tener exactamente 5 dígitos numéricos.');
            isValid = false;
        }

        // 4. Validación de Email
        const email = $('#email').val().trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email !== "" && !emailRegex.test(email)) {
            showError('#email', 'Introduce un correo electrónico válido.');
            isValid = false;
        }

        // 5. Validación de Teléfono (Mínimo 9 dígitos)
        const telefono = $('#telefono').val().trim();
        if (telefono !== "" && telefono.length != 9) {
            showError('#telefono', 'El teléfono debe tener 9 dígitos.');
            isValid = false;
        }

        // 6. Validación de Contraseñas
        const pass = $('#password').val();
        const confirmPass = $('#confirm_password').val();

        if (pass !== "" && pass.length < 6) {
            showError('#password', 'La contraseña debe tener al menos 6 caracteres.');
            isValid = false;
        }

        if (pass !== confirmPass) {
            showError('#confirm_password', 'Las contraseñas no coinciden.');
            isValid = false;
        }

        // 7. Control del envío
        if (!isValid) {
            e.preventDefault();
            // Scroll al primer error
            $('html, body').animate({
                scrollTop: ($('.invalid').first().offset().top - 100)
            }, 500);
        } else {
            $('#pagoBtn').text('Procesando...').prop('disabled', true);
        }
    });

    // Función para mostrar el error
    function showError(selector, message) {
        $(selector).addClass('invalid');
        $(selector).siblings('.error-text').text(message).fadeIn();
    }

    // Limpiar error cuando el usuario vuelve a escribir
    $('input').on('input', function() {
        $(this).removeClass('invalid');
        $(this).siblings('.error-text').fadeOut();
    });
});