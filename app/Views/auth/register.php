<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMN Fitness - Inscripción</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #d9d9d9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        h1,
        h2,
        h3,
        h4,
        label,
        button {
            font-family: 'Montserrat', sans-serif;
        }

        /* Contenedor Principal */
        #form-container {
            background-color: #fff;
            border-radius: 25px;
            width: 100%;
            max-width: 1000px;
            padding: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Cabecera */
        #form-container h2.main-title {
            font-size: 32px;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 14px;
            font-weight: 500;
            color: #7e7c7c;
            margin-bottom: 40px;
            line-height: 1.5;
            max-width: 800px;
        }

        /* Grid del Formulario */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .form-section h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #1a1a1a;
            border-bottom: 3px solid #fed107;
            display: inline-block;
            padding-bottom: 5px;
        }

        /* Estilos de Inputs y Labels */
        .input-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        label {
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 8px;
            color: #333;
            letter-spacing: 0.5px;
        }

        input {
            padding: 14px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: all 0.3s ease;
            outline: none;
        }

        input:focus {
            border-color: #fed107;
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(254, 209, 7, 0.1);
        }

        /* Footer y Botón */
        .form-footer {
            grid-column: span 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        button#pagoBtn {
            background-color: #fed107;
            color: #fff;
            padding: 18px 80px;
            border: none;
            border-radius: 12px;
            font-weight: 800;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.3s;
        }

        button#pagoBtn:hover {
            background-color: #333;
            transform: translateY(-2px);
        }

        button#pagoBtn:active {
            transform: translateY(0);
        }

        small {
            margin-top: 15px;
            color: #7e7c7c;
            font-size: 13px;
        }

        a {
            text-decoration: none;
            color: #fed107;
            font-weight: 700;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Media Querys */
        @media (max-width: 850px) {
            #form-container {
                padding: 30px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .form-footer {
                grid-column: span 1;
            }

            button#pagoBtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div id="form-container">
        <h2 class="main-title">Inscríbete</h2>
        <p class="subtitle">Regístrate y únete a nuestra comunidad de entrenamiento. Lleva un seguimiento de tu progreso, accede a tus clases únicas y controla tu suscripción en un solo lugar.</p>

        <form action="registro" method="post">
            <div class="form-grid">

                <div class="form-section">
                    <h3>Datos personales</h3>

                    <div class="input-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" placeholder="Introduce tu nombre" name="nombre" id="nombre" required>
                    </div>

                    <div class="input-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" placeholder="Introduce tus apellidos" name="apellidos" id="apellidos" required>
                    </div>

                    <div class="input-group">
                        <label for="telefono">Número de teléfono</label>
                        <input type="tel" placeholder="Introduce tu número de teléfono" name="telefono" id="telefono">
                    </div>

                    <div class="input-group">
                        <label for="correo_electronico">Correo electrónico</label>
                        <input type="email" placeholder="Introduce tu correo electrónico" name="correo_electronico" id="correo_electronico" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <input type="password" placeholder="Introduce tu contraseña" name="password" id="password" required>
                    </div>

                    <div class="input-group">
                        <label for="confirm_password">Confirmar contraseña</label>
                        <input type="password" placeholder="Vuelve a introducir tu contraseña" name="confirm_password" id="confirm_password" required>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Datos del domicilio</h3>

                    <div class="input-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" placeholder="Ej: Calle Falsa, 123" name="direccion" id="direccion">
                    </div>

                    <div class="input-group">
                        <label for="direccion_extra">Casa, apartamento, etc.</label>
                        <input type="text" placeholder="Ej: Ático B" name="direccion_extra" id="direccion_extra">
                    </div>

                    <div class="input-group">
                        <label for="codigo_postal">Código postal</label>
                        <input type="text" placeholder="Introduce tu código postal" name="codigo_postal" id="codigo_postal">
                    </div>

                    <div class="input-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" placeholder="Introduce tu ciudad" name="ciudad" id="ciudad">
                    </div>
                    <div class="form-footer">
                        <button type="submit" id="pagoBtn">Continuar al pago</button>
                        <small>¿Ya eres socio? <a href="/login">Inicia sesión</a></small>
                    </div>
                </div>



            </div>
        </form>
    </div>
</body>

</html>