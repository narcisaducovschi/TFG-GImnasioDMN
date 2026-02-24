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

        <h2>Tu rutina de hoy: <?= DIAS_SEMANA[date('l')] ?></h2>

    </div>
</body>

</html>