<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Bienvenido!! </title>

    <?= $this->include('partials/css_links') ?>
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
                <h2>Calcula tu imc</h2>
                <div class="imc">
                    <!-- <form id="imc-form">
                        <label for="peso">Introduce tu peso: </label>
                        <input type="text" placeholder="Peso en KG (Ej: 70)">
                        <label for="altura">Introduce tu altura: </label>
                        <input type="text" placeholder="Altura en CM (Ej: 172)">
                    </form> -->
                </div>
            </div>
        </div>
        <?= $this->include('partials/chatbot') ?>
    </div>
</body>
    <script src="<?= base_url('assets/js/chatbot.js') ?>"></script>
</html>