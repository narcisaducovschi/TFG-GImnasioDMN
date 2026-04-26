<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Editar Usuario</title>
    <?= $this->include('partials/css_links') ?>
    <style>
        :root {
            --primary: #fed107;
            --bg-light: #f4f7f6;
            --text-dark: #333;
            --white: #ffffff;
            --border: #ddd;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        .wrapper {
            margin-left: 200px; /* Espacio para la sidebar */
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .form-card {
            background: var(--white);
            width: 100%;
            max-width: 600px;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        h2 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            margin-bottom: 10px;
            color: #1a1a1a;
        }

        p.subtitle {
            color: #7e7c7c;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 8px;
            color: #444;
        }

        input, select {
            padding: 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus, select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 5px rgba(254, 209, 7, 0.3);
        }

        .btn-container {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        button {
            flex: 1;
            background-color: var(--primary);
            color: #1a1a1a;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #333;
            color: #fff;
        }

        .btn-cancel {
            background-color: #e0e0e0;
            text-align: center;
            text-decoration: none;
            color: #666;
            line-height: 14px; /* Para alinear con el padding del botón */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-cancel:hover {
            background-color: #d0d0d0;
            color: #333;
        }
    </style>
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <div class="wrapper">
        <div class="form-card">
            <h2>Editar Usuario</h2>
            <p class="subtitle">Modifica los datos de acceso, el rol o el nivel de suscripción del socio.</p>

            <?php if (session()->getFlashdata('errors')) : ?>
                <div style="background: #fff3cd; color: #856404; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #ffeeba; font-size: 14px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/updateUser/' . $user['id']) ?>" method="POST">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?= old('nombre', esc($user['nombre'])) ?>" required>
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" value="<?= old('apellidos', esc($user['apellidos'])) ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="<?= old('email', esc($user['email'])) ?>" required>
                </div>

                <div class="form-group">
                    <label for="id_rol">Rol del Usuario</label>
                    <select name="id_rol" id="id_rol">
                        <?php 
                        $roles = [1 => 'Administrador', 2 => 'Trabajador', 3 => 'Profesor', 4 => 'Soporte', 5 => 'Socio'];
                        foreach ($roles as $id => $label): ?>
                            <?php $selected = (old('id_rol', $user['id_rol']) == $id) ? 'selected' : ''; ?>
                            <option value="<?= $id ?>" <?= $selected ?>>
                                <?= $label ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_suscripcion">Tipo de Suscripción</label>
                    <select name="id_suscripcion" id="id_suscripcion">
                        <?php 
                        $suscripciones = [1 => 'None', 2 => 'Básico', 3 => 'Premium'];
                        foreach ($suscripciones as $id => $label): ?>
                            <?php $selected = (old('id_suscripcion', $user['id_suscripcion']) == $id) ? 'selected' : ''; ?>
                            <option value="<?= $id ?>" <?= $selected ?>>
                                <?= $label ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="btn-container">
                    <a href="<?= base_url('admin/usersAdmin') ?>" class="btn-cancel">Cancelar</a>
                    <button type="submit">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    <?= $this->include('partials/scripts') ?>
</body>

</html>