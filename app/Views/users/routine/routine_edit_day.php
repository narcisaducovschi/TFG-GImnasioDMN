<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMN Fitness | Nueva Rutina</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/users/routine_edit_day.css') ?>">
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <div class="container-new">
        <form action="<?= base_url('routine/updateDay') ?>" method="POST">
            
            <?= csrf_field() ?>

            <input type="hidden" name="rutina_id" value="<?= esc($rutina['id']) ?>">
            <input type="hidden" name="dia" value="<?= esc($dia) ?>">

            <div class="form-group">
                <label for="grupo_muscular">Grupo Muscular:</label>
                <input type="text" id="grupo_muscular" name="grupo_muscular" value="<?= esc($rutina['grupo_muscular']) ?>">
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Ejercicio</th>
                        <th>Series</th>
                        <th>Reps</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($ejercicios)): ?>
                        <?php foreach ($ejercicios as $ex): ?>
                            <tr>
                                <td>
                                    <input type="hidden" name="exercise_id[]" value="<?= esc($ex['id']) ?>">
                                    <input type="text" name="nombre_ejercicio[]" value="<?= esc($ex['nombre_ejercicio']) ?>">
                                </td>
                                <td>
                                    <input type="number" name="series[]" value="<?= esc($ex['series']) ?>" min="1">
                                </td>
                                <td>
                                    <input type="text" name="repeticiones[]" value="<?= esc($ex['repeticiones']) ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No hay ejercicios asignados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="actions">
                <button type="submit" class="btn-save">Guardar Cambios</button>
            </div>
        </form>
    </div>

    <script src="<?= base_url('assets/js/users/routine_new.js') ?>"></script>
</body>

</html>