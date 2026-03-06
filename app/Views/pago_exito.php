<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago completado</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 50px 40px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        h2 {
            color: #1a1a1a;
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            font-size: 16px;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;
            background-color: #fed107;
            color: #1a1a1a;
            font-weight: 700;
            padding: 15px 40px;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a:hover {
            background-color: #1a1a1a;
            color: #fff;
            transform: translateY(-2px);
        }

        @media (max-width: 500px) {
            .container {
                padding: 30px 20px;
            }

            h2 {
                font-size: 26px;
            }

            p {
                font-size: 14px;
            }

            a {
                padding: 12px 30px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>¡Pago completado!</h2>
        <p>¡Bienvenido a DMN Fitness! Tu suscripción ha sido activada correctamente.</p>
        <a href="<?= base_url('/') ?>">Volver al inicio</a>
    </div>
</body>

</html>