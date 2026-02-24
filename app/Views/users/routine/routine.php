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
                <p>Espalda</p> <!-- Cambiar día con PHP y DB -->

            </div>
            <!-- Ejercicios (PHP + DB) -->
            <div class="exercice">
                <div class="exercice-container">
                    <h5>Dominadas</h5> <!-- Nombre del ejercicio -->
                    <div class="exercice-info">
                        <div class="exercice-series-reps">
                            <p>Series: 4</p> <!-- Cambiar numero con PHP y DB-->
                            <p>Repeticiones: 12</p>  <!-- Cambiar numero con PHP y DB-->
                        </div>
                        <div class="exercice-notes">
                            <p>Notas: </p>
                            <p>Última serie negativa</p>
                        </div>
                    </div>
                     <a href="#"> <img src="<?= base_url('assets/img/icons/pencil.svg'); ?>">Editar nota</a> <!-- Cambiar href -->
                </div>
            </div>
            <div class="exercice">
                <div class="exercice-container">
                    <h5>Remo con barra</h5> <!-- Nombre del ejercicio -->
                    <div class="exercice-info">
                        <div class="exercice-series-reps">
                            <p>Series: 3 </p> <!-- Cambiar numero con PHP y DB-->
                            <p>Repeticiones: 12</p>  <!-- Cambiar numero con PHP y DB-->
                        </div>
                        <div class="exercice-notes">
                            <p>Notas: </p>
                            <p>Grabarme haciendo el ejercicio para preguntar al entrenador por la técnica</p>
                        </div>
                       <!-- Cambiar href -->
                    </div>
                     <a href="#"> <img src="<?= base_url('assets/img/icons/pencil.svg'); ?>">Editar nota</a> 
                </div>
            </div>

        </div>

    </div>

</body>

</html>