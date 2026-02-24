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

    <div class="container-new">
        <!-- Cambiar con PHP -->
        <form action="/" id="routine-new-form" method="POST">
            <h3>Día</h3><br>
            <div class="form-header">
                <div class="form-subheader">
                    <label for="muscular_group">Grupo Muscular:</label>
                    <input type="text" placeholder="Espalda, pierna, pecho, etc...">
                </div>
                <button>Enviar</button>
            </div>
            <br>
            <h3>Ejercicios: </h3>
            <div class="add-exercice-container">
                <div class="add-exercice-info">
                    <label for="exercice_name">
                        Nombre del ejercicio
                    </label>
                    <input type="text" id="exercice_name" name="exercice_name" placeholder="Ej: Press banca, dominadas, etc...">
                    <label for="exercice_name">
                        Nº de series
                    </label>
                    <input type="text" id="exercice_series" name="exercice_series" placeholder="">
                    <label for="exercice_name">
                        Nº de repeticiones
                    </label>
                    <input type="text" id="exercice_repetitions" name="exercice_repetitions" placeholder="">
                </div>
                <div class="add-exercice-note">
                    <label for="exercice_notes">Notas (Opcional):</label>
                    <input type="text" id="exercice_notes" name="exercice_notes">
                </div>
            </div>
            <div class="btn-new-container">
                <a id="plus"><img src="<?= base_url('assets/img/icons/plus.svg'); ?>"></a>
                <a id="minus"><img src="<?= base_url('assets/img/icons/minus.svg'); ?>"></a>
            </div>
        </form> <!-- Camibar action -->
        <!-- ToDo: 
        Con JS que pille plus y minus,  
        -->

    </div>


</body>
<script src="<?= base_url('assets/js/users/routine_new.js') ?>"></script>

</html>