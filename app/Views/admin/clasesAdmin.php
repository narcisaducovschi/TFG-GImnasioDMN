<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Gestión de Clases</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/admin/clasesAdmin.css') ?>">
</head>
<body>
    <?= $this->include('partials/sidebar') ?>
    <div class="wrapper">
        <div class="header-section">
            <h2>Gestión de Clases</h2>
            <a href="<?= base_url('admin/createClase') ?>" class="btn-add">+ Nueva Clase</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nombre de la Clase</th>
                        <th>Profesor Asignado</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clases as $clase){ ?>
                    <tr>
                        <td><strong><?= esc($clase['nombre']) ?></strong></td>
                        <td><?= esc($clase['profesor_nombre']) ?> <?= esc($clase['profesor_apellidos']) ?></td>
                        <td><?= date('d/m/Y', strtotime($clase['fecha'])) ?></td>
                        <td><?= date('H:i', strtotime($clase['hora'])) ?> hs</td>
                        <td class="actions">
                            <a href="<?= base_url('admin/editClase/'.$clase['id']) ?>" class="btn-edit">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </a>
                            <form action="<?= base_url('admin/deleteClase/'.$clase['id']) ?>" method="POST">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn-delete">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>