<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Bienvenido!! </title>

    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/users/users.css') ?>">
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <div class="users-home-container">
        <h2>Tus clases</h2> <!-- Llenarlo desde PHP -->
        <div class="class-container">
            <div class="class-preview">
                <div class="class">
                    <img src="<?= base_url('assets/img/cardio.jpg'); ?>"> <!-- Img ruta en db -->
                    <h4>Bachata</h4> <!-- Nombre -->
                    <p>12:30 - 14:00 (Lunes) </p> <!-- Horario + Día-->
                    <div class="teacher-container">
                        <img src="<?= base_url('assets/img/icons/school.svg'); ?>">
                        <p>Matias Bolagay</p> <!-- Nombre profesor -->
                        <a href="/chats"><img src="<?= base_url('assets/img/icons/message.svg'); ?>"></a>
                    </div>
                </div>

                <div class="class">
                    <img src="<?= base_url('assets/img/cardio.jpg'); ?>"> <!-- Img ruta en db -->
                    <h4>Bachata</h4> <!-- Nombre -->
                    <p>12:30 - 14:00 (Lunes) </p> <!-- Horario + Día-->
                    <div class="teacher-container">
                        <img src="<?= base_url('assets/img/icons/school.svg'); ?>">
                        <p>Matias Bolagay</p> <!-- Nombre profesor -->
                        <a href="/chats"><img src="<?= base_url('assets/img/icons/message.svg'); ?>"></a>
                    </div>
                </div>

                <div class="class">
                    <img src="<?= base_url('assets/img/cardio.jpg'); ?>"> <!-- Img ruta en db -->
                    <h4>Bachata</h4> <!-- Nombre -->
                    <p>12:30 - 14:00 (Lunes) </p> <!-- Horario + Día-->
                    <div class="teacher-container">
                        <img src="<?= base_url('assets/img/icons/school.svg'); ?>">
                        <p>Matias Bolagay</p> <!-- Nombre profesor -->
                        <a href="/chats"><img src="<?= base_url('assets/img/icons/message.svg'); ?>"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="home-bottom-container">
            <div class="routine-preview-container">
                <h2>Tu rutina de hoy: <?= DIAS_SEMANA[date('l')] ?></h2>
                <div class="routine-preview">

                </div>
            </div>

            <div class="imc-container">
                <div id="imc-header">
                    <h2>Calcula tu IMC</h2>
                    <button type="button" id="open-guia-btn">
                        <img src="<?= base_url('assets/img/icons/info-circle.svg'); ?>" alt="Info IMC">
                    </button>
                </div>

                <form id="imc-form">
                    <div class="form-group">
                        <label for="imc-peso-input">Peso (KG)</label>
                        <input type="number" id="imc-peso-input" placeholder="Ej: 70" min="1">
                    </div>

                    <div class="form-group">
                        <label for="imc-altura-input">Altura (CM)</label>
                        <input type="number" id="imc-altura-input" placeholder="Ej: 172" min="50">
                    </div>

                    <button type="button" id="calcular-imc-btn">Calcular IMC</button>

                    <div id="imc-result">
                        <!-- Aquí se mostrará el resultado -->
                    </div>
                </form>

                <!-- Modal de guía (igual que antes) -->
                <div id="guia-modal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <div class="guia">
                            <small>Peso inferior al normal <br> Menos de 18.5 </small>
                            <small>Peso normal <br> Entre 18.5 y 24.9 </small>
                            <small>Peso superior al normal <br> Entre 25.0 y 29.9 </small>
                            <small>Obesidad <br> Más de 30.0</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->include('partials/chatbot') ?>
    </div>
    <script src="<?= base_url('assets/js/chatbot.js') ?>"></script>
    <script src="<?= base_url('assets/js/modal_imc.js') ?>"></script>
    <script src="<?= base_url('assets/js/calcular_imc.js') ?>"></script>

</body>

</html>