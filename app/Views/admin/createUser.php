<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Nuevo Usuario</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/admin/createUser.css') ?>">
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <div class="wrapper">
        <div class="form-card">
            <h2>Crear Usuario</h2>
            <p class="subtitle">Registra un nuevo miembro en la plataforma.</p>

            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="error-box">
                    <ul style="margin:0">
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/saveUser') ?>" method="POST">
                <?= csrf_field() ?>

                <div style="display: flex; gap: 15px;">
                    <div class="form-group" style="flex: 1;">
                        <label>Nombre</label>
                        <input type="text" name="nombre" value="<?= old('nombre') ?>" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Apellidos</label>
                        <input type="text" name="apellidos" value="<?= old('apellidos') ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Correo Electrónico</label>
                    <input type="email" name="email" value="<?= old('email') ?>" required>
                </div>

                <div class="form-group">
                    <label>Contraseña Provisional</label>
                    <input type="password" name="password" placeholder="Mínimo 6 caracteres" required>
                </div>

                <div class="form-group">
                    <label>Rol</label>
                    <select name="id_rol" required>
                        <?php foreach ($roles as $id => $name): ?>
                            <option value="<?= $id ?>" <?= old('id_rol') == $id ? 'selected' : '' ?>><?= $name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Suscripción</label>
                    <select name="id_suscripcion" required>
                        <?php foreach ($suscripciones as $id => $name): ?>
                            <option value="<?= $id ?>" <?= old('id_suscripcion') == $id ? 'selected' : '' ?>><?= $name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div style="display: flex; gap: 10px; align-items: center;">
                    <a href="<?= base_url('admin/usersAdmin') ?>" style="flex:1; text-align:center; text-decoration:none; color:#666; font-weight:700;">Cancelar</a>
                    <button type="submit" class="btn-primary" style="flex:2;">Registrar Usuario</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>