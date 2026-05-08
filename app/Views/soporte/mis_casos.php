<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mis Casos | Soporte</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/tickets/tickets.css') ?>">
    <?= $this->include('partials/css_links') ?>
</head>

<body>

    <?= $this->include('partials/sidebar') ?>

    <main class="main-content">
        <header class="header-section" style="border-left-color: var(--success-color);">
            <div>
                <h1>Mis casos</h1>
                <p>Tickets asignados a tu cuenta para resolución</p>
            </div>
        </header>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <div class="tickets-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Detalles del Ticket</th>
                        <th style="width: 150px;">Asignado el</th>
                        <th style="width: 180px;">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($casos)): ?>
                        <?php foreach ($casos as $caso): ?>
                            <tr>
                                <td style="vertical-align: top; font-weight: bold;">#<?= $caso['id'] ?></td>
                                <td>
                                    <div style="margin-bottom: 8px;">
                                        <strong style="font-size: 1.1rem;"><?= esc($caso['asunto']) ?></strong>
                                    </div>
                                    <div style="background: var(--bg-light); padding: 1rem; border-radius: 12px; border: 1px solid #eee; font-size: 0.95rem; line-height: 1.6;">
                                        <?= nl2br(esc($caso['descripcion'])) ?>
                                    </div>
                                </td>
                                <td>
                                    <?= date('d M, Y', strtotime($caso['fecha_asignacion'])) ?><br>
                                    <small><?= date('H:i', strtotime($caso['fecha_asignacion'])) ?> hs</small>
                                </td>
                                <td>
                                    <button type="button" class="btn-primary-gym" 
                                            style="background-color: var(--success-color); color: white; width: 100%; border: none;"
                                            onclick="confirmResolve(<?= $caso['id'] ?>, '<?= esc($caso['asunto']) ?>')">
                                        RESOLVER
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align:center; color: var(--text-light); padding: 5rem;">
                                No tienes tickets asignados.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <div id="resolveModal" class="modal-overlay">
        <div class="modal-content-gym">
            <div class="modal-header-gym" style="background-color: var(--success-color); color: white;">
                <h2>¿Ticket Resuelto?</h2>
            </div>
            <div class="modal-body-gym" style="text-align: center;">
                <p>Estás a punto de marcar como finalizado el ticket:</p>
                <div id="modalTicketInfo" class="modal-details" style="margin: 15px 0; font-size: 1.1rem; color: var(--text-dark);">
                    </div>
                <p style="font-size: 0.9rem; color: var(--text-light);">El usuario recibirá una notificación de que su problema ha sido solucionado.</p>
                
                <form id="resolveForm" action="" method="POST" style="margin-top: 20px;">
                    <div style="display: flex; gap: 10px;">
                        <button type="button" class="btn-secundario" style="flex:1;" onclick="closeResolveModal()">CANCELAR</button>
                        <button type="submit" class="btn-primary-gym" style="flex:2; background-color: var(--success-color); color: white; justify-content: center;">
                            SÍ, FINALIZAR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/tickets/confirmar_ticket.js') ?>">
  
    </script>
</body>

</html>