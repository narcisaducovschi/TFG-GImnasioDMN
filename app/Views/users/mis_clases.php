<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Mis Reservas</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/users/clases.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/users/mis_clases.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <main class="main-content">
        <header class="header-section">
            <h1>Mis Reservas</h1>
            <p>Aquí puedes consultar y gestionar tus próximas clases.</p>
        </header>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="reservas-container">
            <?php if (!empty($reservas)): ?>
                <table class="tabla-reservas">
                    <thead>
                        <tr>
                            <th>Clase</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Profesor</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservas as $r): ?>
                            <tr>
                                <td><strong><?= esc($r['nombre']) ?></strong></td>
                                <td><?= date('d/m/Y', strtotime($r['fecha'])) ?></td>
                                <td><?= date('H:i', strtotime($r['hora'])) ?></td>
                                <td><?= esc($r['profesor_nombre']) ?></td>
                                <td><span class="status-badge">Confirmada</span></td>
                                <td>
                                    <button type="button"
                                        class="btn-cancelar-trigger"
                                        data-url="<?= base_url('clases/cancelar/' . $r['id']) ?>"
                                        data-nombre="<?= esc($r['nombre']) ?>"
                                        data-fecha="<?= date('d/m/Y', strtotime($r['fecha'])) ?>">
                                        <i class="fas fa-trash-alt"></i> Cancelar
                                    </button>
                                </td>
                                <div id="modal-cancelar-overlay" class="modal-overlay">
                                    <div class="modal-content border-danger">
                                        <div class="modal-header bg-danger">
                                            <i class="fas fa-exclamation-circle"></i>
                                            <h2>¿Cancelar Clase?</h2>
                                        </div>
                                        <div class="modal-body">
                                            <p>Estás a punto de cancelar tu reserva para:</p>
                                            <div id="detalles-cancelacion" class="modal-details">
                                            </div>
                                            <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="btn-cerrar-cancelar" class="btn-secundario">Volver</button>
                                            <a id="btn-confirmar-borrado" href="#" class="btn-danger-confirm">Confirmar Cancelación</a>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-calendar-times" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.3;"></i>
                    <p>Aún no tienes ninguna clase reservada.</p>
                    <a href="<?= base_url('clases') ?>" class="btn-inscribir" style="display:inline-block; width: auto; margin-top: 1rem; padding: 0.6rem 1.5rem;">Ir a clases</a>
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>
<script src="<?= base_url('assets/js/users/confirmar_cancelar.js') ?>"></script>

</html>