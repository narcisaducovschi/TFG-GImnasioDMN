<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMN Fitness | Nueva Rutina</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/users/routine_new.css') ?>">
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <div class="container-new">
        <form action="<?= base_url('routine/store') ?>" id="routine-new-form" method="POST">
            <?= csrf_field() ?>

            <input type="hidden" name="dia" value="<?= service('request')->getGet('dia') ?? 'Lunes' ?>">

            <h3>Crear rutina para el <?= service('request')->getGet('dia') ?? 'día' ?></h3><br>

            <div class="form-header">
                <div class="form-subheader">
                    <label for="grupo_muscular">Grupo Muscular:</label>
                    <input type="text" name="grupo_muscular" id="grupo_muscular" placeholder="Espalda, pierna, pecho, etc..." required>
                </div>
                <button type="submit">Guardar todo</button>
            </div>

            <br>
            <div id="exercices-list">
                <h3>Ejercicios:</h3>

                <div class="add-exercice-container">
                    <div class="form-row-full">
                        <label>Nombre del ejercicio</label>
                        <input type="text" name="exercice_name[]" placeholder="Ej: Press banca, Sentadillas..." required>
                    </div>

                    <div class="form-grid-stats">
                        <div class="input-group">
                            <label>Series</label>
                            <input type="number" name="exercice_series[]" placeholder="4" required>
                        </div>
                        <div class="input-group">
                            <label>Repeticiones</label>
                            <input type="text" name="exercice_repetitions[]" placeholder="12" required>
                        </div>
                    </div>

                    <div class="form-row-full">
                        <label>Notas (Opcional):</label>
                        <textarea name="exercice_notes[]" rows="3" placeholder="Ej: Controlar el tempo en la bajada..."></textarea>
                    </div>
                </div>
            </div>

            <div class="btn-new-container">
                <a id="plus" title="Añadir ejercicio"><img src="<?= base_url('assets/img/icons/plus.svg'); ?>"></a>
                <a id="minus" title="Eliminar último"><img src="<?= base_url('assets/img/icons/minus.svg'); ?>"></a>
            </div>
        </form>
    </div>

    <script src="<?= base_url('assets/js/users/routine_new.js') ?>"></script>
</body>

</html>