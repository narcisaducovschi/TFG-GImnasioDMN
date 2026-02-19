<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Fuentes -->
    <?= $this->include('partials/css_links') ?>
    <!-- Estilos -->
    <style>
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

        .hero {
            position: relative;
            height: 90vh;
            background: url('/assets/img/tienda/fondo_tienda.jpg') center center / cover no-repeat;
            display: flex;
            align-items: center;
            color: white;
        }

        /* Overlay oscuro */
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right,
                    rgba(0, 0, 0, 0.50) 30%,
                    rgba(0, 0, 0, 0.6) 60%,
                    rgba(0, 0, 0, 0.3) 100%);
        }

        /* Contenedor principal */
        .hero-container {
            position: relative;
            width: 90%;
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Contenido texto */
        .hero-content {
            max-width: 550px;
        }

        /* Título */
        .hero-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        /* Texto amarillo */
        .hero-title span {
            color: #FFD000;
        }

        /* Subtítulo */
        .hero-subtitle {
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 30px;
            color: #e0e0e0;
        }

        /* Botón */
        .hero-btn {
            display: inline-block;
            background: #FFD000;
            color: black;
            padding: 14px 28px;
            border-radius: 8px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .hero-btn:hover {
            background: #e6bd00;
            transform: translateY(-2px);
        }

        /* Productos */
        .hero-products img {
            max-height: 420px;
        }

        /* =========================
                RESPONSIVE
        ========================= */

        @media (max-width: 992px) {

            .hero {
                height: auto;
                padding: 80px 0;
            }

            .hero-container {
                flex-direction: column;
                text-align: center;
            }

            .hero-content {
                margin-bottom: 40px;
            }

            .hero-title {
                font-size: 2.2rem;
            }

            .hero-products img {
                max-height: 300px;
            }
        }
    </style>
</head>

<body>

    <?= $this->include('partials/header') ?>
    <?= $this->include('partials/chatbot') ?>

    <!-- =========================
             HERO SECTION
        ========================= -->
    <section class="hero">

        <!-- Overlay oscuro para mejorar contraste -->
        <div class="hero-overlay"></div>

        <!-- Contenedor principal -->
        <div class="hero-container">

            <!-- Texto principal -->
            <div class="hero-content">

                <!-- Título -->
                <h1 class="hero-title">
                    SUPLEMENTACIÓN <br>
                    Y <span>ROPA DEPORTIVA</span>
                </h1>

                <!-- Subtítulo -->
                <p class="hero-subtitle">
                    LOS MEJORES PRODUCTOS <br>
                    PARA TU ENTRENAMIENTO
                </p>

                <!-- Botón -->
                <a href="#" class="hero-btn">
                    COMPRA YA
                </a>

            </div>

            <!-- Imagen productos -->
            <div class="hero-products">
                <img src="\assets\img\TIENDA\productos_portada.png" alt="Productos deportivos">
            </div>

        </div>
    </section>
</body>
<script src="<?= base_url('assets/js/chatbot.js') ?>"></script>
</html>