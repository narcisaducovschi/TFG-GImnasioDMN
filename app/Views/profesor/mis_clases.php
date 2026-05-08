<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mis Clases | Profesor</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/tickets/tickets.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/profesor/mis_clases.css') ?>">
    <?= $this->include('partials/css_links') ?>

</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <main class="main-content">
        <header class="header-section" style="border-left: 5px solid #5bc0de; padding-left: 20px; margin-bottom: 30px;">
            <div>
                <h1 style="margin: 0; font-size: 2rem;">Mi Agenda de Clases</h1>
                <p style="margin: 5px 0 0 0; color: #666;">Listado de sesiones programadas bajo su cargo</p>
            </div>
        </header>

        <div class="clases-grid">
            <?php if (!empty($clases)): ?>
                <?php foreach ($clases as $clase): ?>
                    <div class="clase-card">
                        <div class="clase-image-container">
                            <?php if (!empty($clase['imagen'])): ?>
                                <img src="<?= base_url('uploads/clases/' . $clase['imagen']) ?>" class="clase-image" alt="Imagen de <?= esc($clase['nombre']) ?>">
                            <?php else: ?>
                                <div style="display: flex; align-items: center; justify-content: center; height: 100%; color: #999;">Sin imagen</div>
                            <?php endif; ?>
                        </div>

                        <div class="clase-info">
                            <h3 class="clase-title"><?= esc($clase['nombre']) ?></h3>
                            <div class="clase-detail">
                                <span>Fecha:</span> <?= date('d/m/Y', strtotime($clase['fecha'])) ?>
                            </div>
                            <div class="clase-detail">
                                <span>Hora:</span> <?= date('H:i', strtotime($clase['hora'])) ?>
                            </div>
                        </div>

                        <div class="clase-actions">
                            <span class="badge-status">Sesión Confirmada</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div style="grid-column: 1/-1; text-align: center; padding: 60px; background: white; border-radius: 12px; border: 1px dashed #ccc;">
                    <p style="color: #666; font-size: 1.1rem;">Actualmente no dispone de clases asignadas en el sistema.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>

</html>