<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mis Tickets de Soporte</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/tickets/tickets.css') ?>">
    <?= $this->include('partials/css_links') ?>
</head>

<body>

    <?= $this->include('partials/sidebar') ?>

    <main class="main-content">
        <header class="header-section">
            <div>
                <h1>Mis tickets</h1>
                <p>Gestiona tus incidencias y consultas técnicas</p>
            </div>
            <button class="btn-primary-gym" onclick="openTicketModal()">
                <i>+</i> NUEVO TICKET
            </button>
        </header>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <div class="tickets-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Asunto</th>
                        <th>Estado</th>
                        <th>Fecha de Creación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($tickets)): ?>
                        <?php foreach ($tickets as $ticket): ?>
                            <tr>
                                <td>#<?= $ticket['id'] ?></td>
                                <td><strong><?= esc($ticket['asunto']) ?></strong></td>
                                <td>
                                    <span class="badge badge-<?= strtolower($ticket['estado']) ?>">
                                        <?= $ticket['estado'] ?>
                                    </span>
                                </td>
                                <td><?= date('d M, Y H:i', strtotime($ticket['fecha_creacion'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align:center; color: var(--text-light); padding: 3rem;">
                                No has creado ningún ticket todavía.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <div id="ticketModal" class="modal-overlay">
        <div class="modal-content-gym">
            <div class="modal-header-gym">
                <h2>NUEVA CONSULTA</h2>
            </div>
            <div class="modal-body-gym">
                <form action="<?= base_url('tickets/guardar') ?>" method="POST">
                    <div class="form-group">
                        <label>ASUNTO</label>
                        <input type="text" name="asunto" class="form-control" placeholder="¿En qué podemos ayudarte?" required>
                    </div>
                    <div class="form-group">
                        <label>DESCRIPCIÓN DETALLADA</label>
                        <textarea name="descripcion" class="form-control" rows="5" placeholder="Danos todos los detalles posibles..." required></textarea>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button type="button" class="btn-secundario" style="flex:1; padding:12px; border-radius:10px; border:none; cursor:pointer;" onclick="closeTicketModal()">CANCELAR</button>
                        <button type="submit" class="btn-primary-gym" style="flex:2; justify-content:center;">ENVIAR TICKET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openTicketModal() {
            document.getElementById('ticketModal').style.display = 'flex';
        }

        function closeTicketModal() {
            document.getElementById('ticketModal').style.display = 'none';
        }
        // Cerrar al hacer clic fuera
        window.onclick = function(event) {
            if (event.target == document.getElementById('ticketModal')) {
                closeTicketModal();
            }
        }
    </script>
</body>

</html>