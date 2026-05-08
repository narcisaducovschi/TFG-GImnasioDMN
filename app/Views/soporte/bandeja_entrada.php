<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tickets Pendientes | Soporte</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/tickets/tickets.css') ?>">
    <?= $this->include('partials/css_links') ?>
</head>

<body>

    <?= $this->include('partials/sidebar') ?>

    <main class="main-content">
        <header class="header-section">
            <div>
                <h1>Bandeja de entrada</h1>
                <p>Tickets nuevos esperando asignación</p>
            </div>
            <div class="stats-badge">
                <strong><?= count($pendientes) ?></strong> LIBRES
            </div>
        </header>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert-danger" style="background-color: var(--danger-color); color: white; padding: 1rem; border-radius: 12px; margin-bottom: 2rem;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="tickets-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Asunto</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pendientes)): ?>
                        <?php foreach ($pendientes as $ticket): ?>
                            <tr>
                                <td>#<?= $ticket['id'] ?></td>
                                <td><span class="text-light">ID Cliente: <?= $ticket['id_usuarios'] ?></span></td>
                                <td>
                                    <strong><?= esc($ticket['asunto']) ?></strong>
                                    <p style="font-size: 0.85rem; color: var(--text-light); margin: 5px 0 0 0;">
                                        <?= word_limiter(esc($ticket['descripcion']), 10) ?>
                                    </p>
                                </td>
                                <td><?= date('d M, Y H:i', strtotime($ticket['fecha_creacion'])) ?></td>
                                <td>
                                    <a href="<?= base_url('soporte/tomar/' . $ticket['id']) ?>" class="btn-primary-gym" style="font-size: 0.8rem; padding: 0.6rem 1.2rem;">
                                        TOMAR TICKET
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align:center; color: var(--text-light); padding: 4rem;">
                                
                                No hay tickets pendientes. ¡Todo al día!
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>