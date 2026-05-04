<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Clases</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/users/clases.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?= $this->include('partials/sidebar') ?>

    <main class="main-content">
        <header class="header-section">
            <h1>Nuestras Clases</h1>
            <p>Reserva tu lugar en las próximas sesiones.</p>
        </header>

        <div class="clases-grid">
            <?php if (!empty($clases)): ?>
                <?php foreach ($clases as $clase): ?>
                    <?php 
                        $horarioClase = $clase['fecha'] . '|' . $clase['hora'];
                        $yaReservada = in_array($horarioClase, $ocupados);
                    ?>
                    <article class="clase-card">
                        <img src="<?= base_url('uploads/clases/' . ($clase['imagen'] ?: 'default.jpg')) ?>" class="clase-image">
                        
                        <div class="clase-info">
                            <h3 class="clase-title"><?= esc($clase['nombre']) ?></h3>
                            
                            <div class="clase-detail">
                                <i class="fas fa-calendar-day"></i>
                                <span><?= date('d M, Y', strtotime($clase['fecha'])) ?></span>
                            </div>
                            
                            <div class="clase-detail">
                                <i class="fas fa-clock"></i>
                                <span><?= date('H:i', strtotime($clase['hora'])) ?> hs</span>
                            </div>

                            <div class="clase-detail">
                                <i class="fas fa-user-ninja"></i>
                                <span>Prof: <?= esc($clase['profesor_nombre']) ?> <?= esc($clase['profesor_apellidos']) ?></span>
                            </div>
                        </div>

                        <?php if ($yaReservada): ?>
                            <button class="btn-inscribir btn-disabled" disabled>Horario Ocupado</button>
                        <?php else: ?>
                            <a href="<?= base_url('clases/reservar/' . $clase['id']) ?>" class="btn-inscribir">Reservar Clase</a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay clases disponibles.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>