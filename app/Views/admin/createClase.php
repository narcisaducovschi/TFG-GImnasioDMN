<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Nueva Clase</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/admin/createClase.css') ?>">
</head>
<body>
    <?= $this->include('partials/sidebar') ?>

    <div class="wrapper">
        <div class="form-card">
            <h2>Crear Nueva Clase</h2>

            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="error-list">
                    <ul style="margin:0">
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/saveClase') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>Nombre de la Clase</label>
                    <input type="text" name="nombre" placeholder="Ej: Zumba, Crossfit..." value="<?= old('nombre') ?>" required>
                </div>

                <div class="form-group">
                    <label>Imagen de la Clase</label>
                    <input type="file" name="imagen" accept="image/*" required>
                    <small style="color: #666; margin-top: 5px;">Formatos permitidos: JPG, PNG. Máx 2MB.</small>
                </div>

                <div class="form-group">
                    <label>Profesor</label>
                    <select name="id_profesor" required>
                        <option value="">Selecciona un profesor...</option>
                        <?php foreach($profesores as $p): ?>
                            <option value="<?= $p['id'] ?>" <?= old('id_profesor') == $p['id'] ? 'selected' : '' ?>>
                                <?= $p['nombre'] ?> <?= $p['apellidos'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div style="display: flex; gap: 20px;">
                    <div class="form-group" style="flex: 1;">
                        <label>Fecha</label>
                        <input type="date" name="fecha" value="<?= old('fecha') ?>" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Hora</label>
                        <input type="time" name="hora" value="<?= old('hora') ?>" required>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <a href="<?= base_url('admin/clasesAdmin') ?>" style="flex:1; text-align:center; padding:15px; text-decoration:none; color:#666; font-weight:700">Cancelar</a>
                    <button type="submit" class="btn-save" style="flex:2">Crear Clase</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>