<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Mis Tareas</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/worker/myTasks.css') ?>">
</head>
<body>
    <?= $this->include('partials/sidebar') ?>
    <div class="wrapper">
        <div class="header-section">
            <h2>Mis tareas</h2>
        </div>

        <div class="filter-container">
            <a href="<?= base_url('worker/myTasks') ?>"
                class="btn-filter <?= $filter !== 'today' ? 'active' : '' ?>">Todas las tareas</a>
            <a href="<?= base_url('worker/myTasks?filter=today') ?>"
                class="btn-filter <?= $filter === 'today' ? 'active' : '' ?>">Tareas de hoy</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Descripción de la Tarea</th>
                        <th>Fecha de Ejecución</th>
                        <th>Estado</th>
                        <th style="text-align: center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($misTareas)): ?>
                        <?php foreach ($misTareas as $tarea): ?>
                            <tr>
                                <td><strong><?= esc($tarea['descripcion']) ?></strong></td>
                                <td><?= date('d/m/Y', strtotime($tarea['fecha_ejecucion'])) ?></td>
                                <td><span class="status-badge">Pendiente</span></td>
                                <td class="actions" style="justify-content: center;">
                                    <button type="button" class="btn-complete" 
                                            onclick="openCompleteModal('<?= base_url('worker/completeTask/' . $tarea['id']) ?>')">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="empty-message">No hay tareas para mostrar.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="complete-modal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#2e7d32" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <h3>¿Tarea finalizada?</h3>
            <p>Confirma que has completado esta tarea correctamente para eliminarla de tu lista.</p>
            
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="closeCompleteModal()">Cancelar</button>
                <form id="form-confirm-complete" action="" method="POST">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn-confirm">Sí, completar</button>
                </form>
            </div>
        </div>
    </div>

    <?= $this->include('partials/scripts') ?>
    
    <script src="<?= base_url('assets/js/worker/myTasks.js') ?>"></script>
</body>
</html>