<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Inicio </title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/img/logo.png') ?>">

    <!-- Fuentes -->
    <?= $this->include('partials/css_links') ?>

    <!-- Estilos -->
    <style>

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
            <p>Una comunidad que crece cada día, únete a nosotros y disfruta de las ventajas.</p>
        </div>

        <div class="info-right">
            <img src="<?= base_url('assets/img/cardio.jpg') ?>" alt="Cardio">
        </div>
    </section>

    <!-- Publicidad de la tienda -->
    <section class="store-section">
        <div class="store-flex">
            <div class="store-left">
                <img src="<?= base_url('assets/img/promo1.png') ?>">
            </div>
            <div class="store-right">
                <div><img src="<?= base_url('assets/img/promo2.png') ?>"></div>
                <div><img src="<?= base_url('assets/img/promo3.png') ?>"></div>
            </div>
        </div>

        <div class="store-button">
            <a href="/shop">VER TODOS LOS PRODUCTOS</a>
        </div>
    </section>
    <!-- ¿Por qué nosotros section ? -->
    <section class="why-us-section">
        <h2>¿Por qué nosotros?</h2>
        <p>Todo lo que necesitas para entrenar sin excusas.</p>
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
                    <p>Estamos abiertos los 365 días del año, desde las 6 am hasta las 10pm.</p>
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
                    <p>Añade y modifica tus rutinas a tu gusto.</p>
                </div>
                <div class="box">
                    <svg class='icon' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#c2c520" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chalkboard-teacher">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 19h-3a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v11a1 1 0 0 1 -1 1" />
                        <path d="M12 14a2 2 0 1 0 4.001 -.001a2 2 0 0 0 -4.001 .001" />
                        <path d="M17 19a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2" />
                    </svg>
                    <h3>Los mejores profesionales</h3>
                    <p>Un equipo experto que te acompaña en cada paso de tu transformación.</p>
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
                    <p>·Entrenamientos guiados con entrenadores personales, fuentes de agua con vitaminas y acceso a todas las clases. </p>
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
                <p>No dudes en enviar un ticket para recibir una ayuda más personalizada y directa.</p>
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
<script src="<?= base_url('assets/js/index.js') ?>"></script>
</html>