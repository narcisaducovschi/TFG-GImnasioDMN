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
            transform: translateY(-350px);
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

        /* ¿Por qué nosotros? Section */
        .why-us-section {
            background-color: #2f2f2f;
            height: calc(100vh + 250px);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex-direction: column;
        }

        .why-us-section h2 {
            color: #fff;
            font-weight: 800;
            font-family: Inter, Arial, Helvetica, sans-serif;
            font-size: 60px;
            margin: 0;
        }

        .why-us-section p {
            color: #fff;
            font-family: Inter, Arial, Helvetica, sans-serif;
            font-size: 30px;
        }

        .why-us-container {
            background-color: #151414;
            width: 1100px;
            height: 1025px;
            border-radius: 75px;
            box-shadow: 0px 0px 21px 10px rgba(213, 217, 255, 0.5);
        }

        .why-us-info {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            padding: 30px;
            width: 100%;
        }

        .box {
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .box h3 {
            font-size: 21px;
            font-weight: bold;
            font-family: Inter, Arial, Helvetica, sans-serif;
        }

        .box p {
            margin-top: -10px;
            width: 200px;
            text-wrap: wrap;
            font-size: 17px;
            font-weight: 300;
            font-family: Inter, Arial, Helvetica, sans-serif;
        }

        .icon {
            width: 100px;
            height: 100px;
            filter: drop-shadow(0px 0px 15px rgba(233, 196, 103, 0.7));
        }

        .separator-h {
            background-color: rgba(150, 147, 162, 0.2);
            width: 90%;
            height: 5px;
            margin-left: 5%;
        }

        .why-us-pricing {
            display: flex;
            gap: 20%;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .pricing-basic {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 42px;
            width: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .pricing-basic h3 {
            font-weight: 800;
            font-size: 30px;
        }

        .pricing-basic p {
            color: #000;
            width: 250px;
            text-wrap: wrap;
            font-size: 18px;
            font-weight: bold;
        }

        .pricing-basic img {
            width: 100%;
            height: auto;
            border-radius: 42px 42px 0 0;
            object-fit: cover;
        }

        .pricing-premium {
            margin-top: 20px;
            background-color: #212125;
            border-radius: 42px;
            width: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 0px 21px 0px rgba(226, 197, 8);
        }

        .pricing-premium p {
            margin-top: -10px;
            color: #fff;
            width: 250px;
            text-wrap: wrap;
            font-size: 18px;
            font-weight: bold;
        }


        .pricing-premium img {
            width: 100%;
            height: auto;
            border-radius: 42px 42px 0 0;
            object-fit: cover;
        }

        .pricing-premium h3 {
            font-weight: 800;
            font-size: 30px;
            color: #e2c508;
        }

        /* FAQs Section */
        .faqs-section {
            background-color: #2f2f2f;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 80px 20px;
            text-align: center;
        }

        .faqs-section h1 {
            color: #fff;
            font-size: 50px;
            font-weight: 800;
            margin-bottom: 50px;
        }

        .faqs {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 80%;
            max-width: 900px;
        }

        .faqs-container {
            background-color: #151414;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .faqs-question {
            padding: 20px 30px;
            font-weight: 700;
            color: #fff;
            cursor: pointer;
            position: relative;
            user-select: none;
            transition: background-color 0.3s;
        }

        .faqs-question::after {
            content: '+';
            position: absolute;
            right: 30px;
            font-size: 25px;
            transition: transform 0.3s;
        }

        .faqs-container.active .faqs-question::after {
            content: '-';
            transform: rotate(180deg);
        }

        .faqs-content {
            max-height: 0;
            overflow: hidden;
            background-color: #333;
            color: #fff;
            padding: 0 30px;
            transition: max-height 0.5s ease, padding 0.3s ease;
        }

        .faqs-container.active .faqs-content {
            max-height: 500px;
            padding: 20px 30px;
        }

        .faqs-content p {
            margin: 0;
            font-size: 16px;
            line-height: 1.5;
        }

        .tickets {
            margin-top: 2%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            color: #fff;
            width: 59%;
            background-color: #151414;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
            border-radius: 25px;
        }

        .tickets-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .tickets-left h1 {
            margin: 0 0 10px 0;
            font-size: 28px;
        }

        .tickets-left p {
            margin: 0;
            font-size: 16px;
            width: 500px;
            text-align: left;
        }

        .tickets-left a {
            text-decoration: none;
            background-color: #fff;
            color: #000;
            width: 200px;
            padding: 5px;
            border-radius: 300px;
            margin-top: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .tickets-left a:hover {
            cursor: pointer;
            background-color: #fed107;
            color: #000;
        }


        .tickets-icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tickets-icon svg {
            width: 50px;
            height: 50px;
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
    <!-- ¿Por qué nosotros section ? -->
    <section class="why-us-section">
        <h2>¿Por qué nosotros?</h2>
        <p>Todo lo que necesitas para entrenar sin excusas</p>
        <div class="why-us-container">
            <div class="why-us-info">
                <div class="box">
                    <svg class='icon' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#c2c520" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12" />
                        <path d="M16 3v4" />
                        <path d="M8 3v4" />
                        <path d="M4 11h16" />
                        <path d="M7 14h.013" />
                        <path d="M10.01 14h.005" />
                        <path d="M13.01 14h.005" />
                        <path d="M16.015 14h.005" />
                        <path d="M13.015 17h.005" />
                        <path d="M7.01 17h.005" />
                        <path d="M10.01 17h.005" />
                    </svg>
                    <h3>Abiertos todo el año</h3>
                    <p>Estamos abiertos los 365 días del año, desde las 6 am hasta las 10pm </p>
                </div>
                <div class="box">
                    <svg class='icon' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#c2c520" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-text">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <path d="M9 5a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2" />
                        <path d="M9 12h6" />
                        <path d="M9 16h6" />
                    </svg>
                    <h3>Rutinas personalizadas</h3>
                    <p>Añade y modifica tus rutinas a tu gusto</p>
                </div>
                <div class="box">
                    <svg class='icon' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#c2c520" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chalkboard-teacher">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 19h-3a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v11a1 1 0 0 1 -1 1" />
                        <path d="M12 14a2 2 0 1 0 4.001 -.001a2 2 0 0 0 -4.001 .001" />
                        <path d="M17 19a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2" />
                    </svg>
                    <h3>Los mejores profesionales</h3>
                    <p>Un equipo experto que te acompaña en cada paso de tu transformación</p>
                </div>
            </div>
            <div class="separator-h"></div>
            <div class="why-us-pricing">
                <div class="pricing-basic">
                    <div class="basic-image">
                        <img src="<?= base_url('assets/img/pricing-basic.jpg') ?>">
                    </div>
                    <h3>PLAN BASICO</h3>
                    <p>·Acceso completo sala de entrenamientos de musculación libre y máquinas</p>
                </div>

                <div class="pricing-premium">
                    <div class="premium-image">
                        <img src="<?= base_url('assets/img/pricing-premium.jpg') ?>">
                    </div>
                    <h3>PLAN PREMIUM</h3>
                    <p>·Entrenamientos guiados con entrenadores personales, fuentes de agua con vitaminas y acceso a todas las clases </p>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQs Section -->
    <section class="faqs-section">
        <h1>Preguntas Frecuentes</h1>
        <div class="faqs">
            <div class="faqs-container">
                <div class="faqs-question">¿Necesito experiencia previa parar entrenar?</div>
                <div class="faqs-content">
                    <p>No, no necesitas experiencia previa. Nuestros entrenadores y rutinas están diseñados para principiantes y avanzados, adaptándose a tu nivel de condición física.</p>
                </div>
            </div>
            <div class="faqs-container">
                <div class="faqs-question">¿Cuanto tiempo duran las clases guiadas?</div>
                <div class="faqs-content">
                    <p>La duración de las clases guiadas varía según la disciplina: generalmente entre 45 y 60 minutos por sesión. La hora de inicio y de finalización de la clase está indicada a la hora de hacer la reserva, pero esta puede variar en función de factores externos. </p>
                </div>
            </div>
            <div class="faqs-container">
                <div class="faqs-question">¿Puedo cambiar de plan más adelante?</div>
                <div class="faqs-content">
                    <p>Sí, puedes cambiar de plan en cualquier momento, ya sea desde la web o acudiendo a recepción para hablar con el encargado.</p>
                </div>
            </div>
        </div>
        <div class="tickets">
            <div class="tickets-left">
                <h1>¿Sigues con dudas?</h1>
                <p>No dudes en enviar un ticket para recibir una ayuda más personalizada y directa</p>
                <a href="/tickets">Contactanos</a>
            </div>
            <div class="tickets-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#c2c520" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-message-report">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12" />
                    <path d="M12 8v3" />
                    <path d="M12 14v.01" />
                </svg>
            </div>
        </div>
    </section>

</body>
<script>
    const faqs = document.querySelectorAll('.faqs-container');

    faqs.forEach(faq => {
        const question = faq.querySelector('.faqs-question');
        const content = faq.querySelector('.faqs-content');


        content.style.transition = "height 0.3s ease, padding 0.3s ease";

        question.addEventListener('click', () => {
            const isActive = faq.classList.contains('active');

            faqs.forEach(item => {
                const c = item.querySelector('.faqs-content');
                c.style.height = 0;
                item.classList.remove('active');
            });

            if (!isActive) {
                faq.classList.add('active');
                content.style.height = content.scrollHeight + "px";
            }
        });

    });
</script>

</html>