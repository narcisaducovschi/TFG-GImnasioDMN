<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Editar Clase</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/admin/editClase.css') ?>">
</head>
<body>
    <?= $this->include('partials/sidebar') ?>
    <div class="wrapper">
        <div class="form-card">
            <h2>Editar Clase</h2>
            <form action="<?= base_url('admin/updateClase/' . $clase['id']) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>Imagen Actual</label>
                    <img src="<?= base_url('uploads/clases/' . ($clase['imagen'] ?: 'default.jpg')) ?>" class="current-img">
                    <input type="file" name="imagen_nueva" accept="image/*">
                    <small>Deja en blanco si no quieres cambiar la imagen.</small>
                </div>

                <div class="form-group">
                    <label>Nombre de la Clase</label>
                    <input type="text" name="nombre" value="<?= old('nombre', $clase['nombre']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Profesor</label>
                    <select name="id_profesor">
                        <?php foreach($profesores as $p): ?>
                            <option value="<?= $p['id'] ?>" <?= ($p['id'] == $clase['id_profesor']) ? 'selected' : '' ?>>
                                <?= $p['nombre'] ?> <?= $p['apellidos'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div style="display: flex; gap: 20px;">
                    <div class="form-group" style="flex: 1;">
                        <label>Fecha</label>
                        <input type="date" name="fecha" value="<?= old('fecha', $clase['fecha']) ?>" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Hora</label>
                        <input type="time" name="hora" value="<?= old('hora', $clase['hora']) ?>" required>
                    </div>
                </div>

                <button type="submit" class="btn-save">Actualizar Clase</button>
            </form>
        </div>
    </div>
</body>
</html>