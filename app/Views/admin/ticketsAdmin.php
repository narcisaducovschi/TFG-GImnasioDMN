<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión Global de Tickets | Admin</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/tickets/tickets.css') ?>">
    <?= $this->include('partials/css_links') ?>
</head>

<body>

    <?= $this->include('partials/sidebar') ?>

    <main class="main-content">
        <header class="header-section" style="border-left-color: var(--text-dark);">
            <div>
                <h1>Gestión de Soporte</h1>
                <p>Panel de supervisión de todas las incidencias del sistema</p>
            </div>
        </header>

        <div class="tickets-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Asunto / Descripción</th>
                        <th>Estado</th>
                        <th>Técnico Asignado</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($tickets)): ?>
                        <?php foreach ($tickets as $ticket): ?>
                            <tr>
                                <td>#<?= $ticket['id'] ?></td>
                                <td>
                                    <strong><?= esc($ticket['cliente_nombre'] . ' ' . $ticket['cliente_apellido']) ?></strong>
                                </td>
                                <td>
                                    <div style="font-weight: bold;"><?= esc($ticket['asunto']) ?></div>
                                    <small style="color: var(--text-light);"><?= character_limiter(esc($ticket['descripcion']), 50) ?></small>
                                </td>
                                <td>
                                    <span class="badge badge-<?= strtolower($ticket['estado']) ?>">
                                        <?= $ticket['estado'] ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($ticket['tecnico_nombre']): ?>
                                        <span style="color: var(--text-light); font-weight: bold;">
                                             <?= esc($ticket['tecnico_nombre']) ?>
                                        </span>
                                    <?php else: ?>
                                        <span style="color: var(--text-light); font-style: italic;">Sin asignar</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= date('d/m/Y', strtotime($ticket['fecha_creacion'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align:center; padding: 3rem;">No hay tickets registrados en el sistema.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>