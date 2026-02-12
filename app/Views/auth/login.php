<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMN Fitness - Log in</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

    body {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        background-color: #d9d9d9;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }

    * {
        font-family: Arial;
        box-sizing: border-box;
    }

    h1, h2, h3, h4, h5, h6, label, button {
        font-family: Montserrat;
    }

    #form-container {
        background-color: #fff;
        border-radius: 25px;
        width: 100%;
        max-width: 968px;
        min-height: 600px;
        display: flex; /* Divide en dos columnas */
        overflow: hidden; /* Clave para que la imagen no se salga de las esquinas */
    }

    #login-content {
        flex: 1; /* Toma el 50% del espacio */
        padding: 60px 40px; /* Más espacio interno */
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Quitamos los anchos fijos de 331px y 277px */
    #form-container h2 {
        font-size: 30px;
        font-weight: 800;
        margin: 0 0 10px 0;
        color: #1a1a1a;
    }

    #login-content p {
        font-size: 13px; /* Un poco más legible que 10px */
        font-weight: 500;
        color: #7e7c7c;
        margin: 0 0 30px 0; /* Espacio hacia abajo corregido */
    }

    /* Estilos para que el formulario se vea profesional */
    form {
        display: flex;
        flex-direction: column;
    }

    label {
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    input {
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        outline: none;
    }

    button {
        background-color: #fed107;
        color: #fff;
        padding: 15px;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        margin-top: 10px;
        transition: 0.3s;
    }

    button:hover {
        background-color: #333;
    }

    .login-image {
        flex: 1;
        display: flex;
    }

    img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    small 
    {
        margin-top: 10px;
    }
    
    a{
        text-decoration: none;
        color: #fed107;
    }

    a:hover{
        text-decoration: underline;
    }

    /* Media Querys */
    @media (max-width: 768px) {
        #form-container {
            flex-direction: column;
        }
        .login-image {
            display: none;
        }
    }
</style>

<body>
    <div id="form-container">
        <div id="login-content">
            <form action="login" method="post">
                <h2>Inicio de sesión</h2>
                <p>Inica sesión en tu cuenta para mantener el control de tu progreso, seguir cada una de tus clases y gestionar tu suscripción de manera sencilla.</p>

                <label for="correo_electronico">Correo electrónico</label>
                <input type="email" placeholder="Introduce tu correo electrónico" name="correo_electronico" id="correo_electronico">

                <label for="password">Contraseña</label>
                <input type="password" placeholder="Introduce tu contraseña" name="password" id="password">
                <button id="loginBtn">Iniciar sesión</button>
                <small>¿Aún no eres socio? <a href="#">Inscríbete</a></small>
            </form>
        </div>

        <div class="login-image">
            <img src="<?= base_url('assets/img/auth/login-img.jpg') ?>" alt="Persona realizando ejercicio de fuerza">
        </div>
    </div>
</body>

</html>