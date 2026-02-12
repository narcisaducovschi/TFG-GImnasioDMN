<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | </title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/img/logo.png') ?>">

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- Estilos -->
    <style>
        /* Reset básico */
        html,
        body {
            overscroll-behavior: none;
            margin: 0;
            padding: 0;
            font-family: Inter, Arial, Helvetica, sans-serif;
            font-size: 16px;
            color: rgba(33, 37, 41, 1);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        /* Hero */
        .hero {
            height: calc(100vh - 80px);
            background-image: url('<?= base_url('assets/img/hero.jpg') ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 0 20px;
        }

        .hero h2 {
            font-size: 2.5rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            line-height: 1.3;
        }

        .hero h2 span {
            display: inline;
        }

        .hero h2 span+span {
            display: block;
            margin-top: 10px;
        }


        .hero a {
            display: inline-block;
            text-decoration: none;
            background-color: #fbd32d;
            color: #000;
            padding: 20px 40px;            
            font-size: 35px;
            font-weight: 800;
            border-radius: 10px;
            border: none;
            margin-top: 40px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .hero a:hover {
            background-color: #000;
            color: #fbd32d;
        }


        /* Info Section */
        .info-section {
            height: 100vh;
            display: flex;
            background-color: #000;
            overflow: hidden;
        }

        .info-left {
            width: 75%;
            background-color: #fff;
            clip-path: polygon(0% 0%, 100% 0%, 80% 100%, 0% 100%);
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .info-left .stats {
            display: flex;
            flex: 1;
            gap: 50px;
        }

        .info-left .stats h1:first-child {
            font-size: 145px;
            font-weight: 800;
            color: #fed107;
        }

        .info-left .stats h1:last-child {
            font-size: 60px;
            font-weight: 800;
            margin: 0;
            color: #000;
            line-height: 0.9;
            font-style: italic;
            font-family: Montserrat, sans-serif;
            padding-top: 21%;
            text-align: left;
        }

        .info-left p {
            font-size: 35px;
            color: #000;
            margin-top: -70%;
            font-weight: 900;
            font-style: italic;
            text-align: left;
            width: 600px;
        }

        .info-right {
            width: 45%;
            margin-left: -20%;
            z-index: 1;
        }

        .info-right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Publicidad de la tienda */
        .store-section {
            background-color: #fff;
            padding: 20px;
            box-sizing: border-box;
        }

        .store-flex {
            display: flex;
            gap: 50px;
            height: calc(100vh - 100px);
        }

        .store-left {
            background-color: #000;
            flex: 7;
        }

        .store-right {
            display: flex;
            flex-direction: column;
            flex: 3;
            gap: 10px;
        }

        .store-right div {
            background-color: #000;
            flex: 1;
        }

        .store-button {
            text-align: center;
            margin-top: 30px;
        }

        .store-button a {
            display: inline-block;
            text-decoration: none;
            background-color: #fff;
            color: #000;
            border: 1px solid #000;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: bold;
        }

        .store-button a:hover {
            background-color: #000;
            color: #fff;
            transition: 0.3s;
        }
    </style>
</head>

<body>

    <!-- Header Nav -->
    <?= $this->include('partials/header') ?>

    <!-- Hero -->
    <section class="hero">
        <h2>
            <span>BIENVENIDO A <span style="color: #fed107;">DMN FITNESS</span></span>
            <span style="display: block; margin-top: 10px;">ENTRENA AL MÁS ALTO NIVEL</span>
            <a href="/register">ÚNETE AHORA</a>
        </h2>
    </section>


    <!-- Info Section -->
    <section class="info-section">
        <div class="info-left">
            <div class="stats">
                <h1>126</h1>
                <h1>NUEVAS<br>MAQUINAS</h1>
            </div>
            <p>Una comunidad que crece cada día, únete a nosotros y disfruta de las ventajas</p>
        </div>

        <div class="info-right">
            <img src="<?= base_url('assets/img/cardio.jpg') ?>" alt="Cardio">
        </div>
    </section>

    <!-- Publicidad de la tienda -->
    <section class="store-section">
        <div class="store-flex">
            <div class="store-left"></div>
            <div class="store-right">
                <div></div>
                <div></div>
            </div>
        </div>

        <div class="store-button">
            <a href="/tienda">VER TODOS LOS PRODUCTOS</a>
        </div>
    </section>

</body>

</html>