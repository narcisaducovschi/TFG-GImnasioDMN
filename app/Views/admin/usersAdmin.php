<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Bienvenido!!</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/admin/setTask.css') ?>">
</head>

<body>
    <?= $this->include('partials/sidebar') ?>
    <div class="wrapper">
        <h2>Asignar tareas</h2>

        <form action="<?= base_url('admin/saveTask') ?>" method="POST" class="task-form">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="id_usuario">Trabajador:</label>
                <select name="id_usuario" id="id_usuario" required>
                    <option value="" disabled selected>Selecciona un trabajador...</option>
                    <?php foreach ($trabajadores as $t): ?>
                        <option value="<?= $t['id'] ?>"><?= esc($t['nombre']) ?> <?= esc($t['apellidos']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_ejecucion">¿Para qué día es la tarea?</label>
                <input type="date" name="fecha_ejecucion" id="fecha_ejecucion"
                    value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="4" placeholder="Ej: Revisar inventario de pesas..." required></textarea>
            </div>

            <button type="submit" class="btn-submit">Programar Tarea</button>
        </form>
    </div>
    <?= $this->include('partials/scripts') ?>
</body>

</html>