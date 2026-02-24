<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMN Fitness | Rutina</title>
    <?= $this->include('partials/css_links') ?>
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <!-- Contenedor nuevo -->
    <div class="routine-wrapper">

        <!-- Días -->
        <div class="days">
            <a href="">L</a>
            <a href="">M</a>
            <a href="">X</a>
            <a href="">J</a>
            <a href="" class="selected">V</a>
            <a href="">S</a>
            <a href="">D</a>
        </div>

        <!-- Rutina -->
        <div class="routine">
            <div class="routine-header">
                <div class="title">
                    <h2>Viernes</h2> <!-- Cambiar día con PHP y DB -->
                    <a href="#"> <img src="<?= base_url('assets/img/icons/pencil.svg'); ?>">Editar rutina</a><!--Cambiar href -->
                </div>
                <h2>Espalda</h2> <!-- Cambiar día con PHP y DB -->

            </div>
        </div>

    </div>

</body>

</html>