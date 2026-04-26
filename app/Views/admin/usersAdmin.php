<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Gestión de Usuarios</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/admin/usersAdmin.css') ?>">
    <?= $this->include('partials/css_links') ?>
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <div class="wrapper">
        <div class="header-section">
            <h2>Gestión de Usuarios</h2>
            <a href="<?= base_url('admin/createUser') ?>" class="btn-add">
                <span>+</span> Añadir Nuevo Usuario
            </a>
        </div>

        <?php if (session()->getFlashdata('success')) { ?>
            <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-family: Montserrat; font-weight: 600; border: 1px solid #c3e6cb;">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php } ?>

        <?php if (session()->getFlashdata('error')) { ?>
            <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-family: Montserrat; font-weight: 600; border: 1px solid #f5c6cb;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php } ?>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Suscripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $roles = [1 => 'Admin', 2 => 'Trabajador', 3 => 'Profesor', 4 => 'Soporte', 5 => 'Socio'];
                    $subs = [1 => 'Trabajador', 2 => 'Básico', 3 => 'Premium'];

                    foreach ($usuarios as $user) {
                    ?>
                        <tr>
                            <td>
                                <strong><?= esc($user['nombre']) ?></strong><br>
                                <small style="color: #999;"><?= esc($user['apellidos']) ?></small>
                            </td>
                            <td><?= esc($user['email']) ?></td>
                            <td>
                                <span class="badge role-<?= $user['id_rol'] ?>">
                                    <?= $roles[$user['id_rol']] ?? 'User' ?>
                                </span>
                            </td>
                            <td>
                                <span style="font-weight: 600; color: <?= $user['id_suscripcion'] > 1 ? '#2ecc71' : '#999' ?>;">
                                    <?= $subs[$user['id_suscripcion']] ?? 'None' ?>
                                </span>
                            </td>
                            <td class="actions">
                                <a href="<?= base_url('admin/editUser/' . $user['id']) ?>" class="btn-action btn-edit" title="Editar">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                </a>

                                <form action="<?= base_url('admin/deleteUser/' . $user['id']) ?>" method="POST">
                                    <button type="submit" class="btn-action btn-delete" title="Eliminar">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?= $this->include('partials/scripts') ?>
</body>

</html>