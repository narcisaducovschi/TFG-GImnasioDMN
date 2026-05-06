<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMN Fitness | Clases</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/users/clases.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <main class="main-content">
        <header class="header-section">
            <h1>Apuntate a clases</h1>
            <p>Reserva tu lugar en las próximas sesiones. Recuerda que debe haber al menos 1 hora de diferencia entre tus reservas.</p>
        </header>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="clases-grid">
            <?php if (!empty($clases)): ?>
                <?php foreach ($clases as $clase): ?>
                    <?php
                    $esMismaClase = false;
                    $hayConflicto = false;

                    $timestampClaseActual = strtotime($clase['fecha'] . ' ' . $clase['hora']);

                    if (!empty($misReservas)) {
                        foreach ($misReservas as $reserva) {
                            if ($reserva['id_clase'] == $clase['id']) {
                                $esMismaClase = true;
                                break;
                            }
                            if ($reserva['fecha'] === $clase['fecha']) {
                                $timestampReserva = strtotime($reserva['fecha'] . ' ' . $reserva['hora']);
                                $diferenciaSegundos = abs($timestampClaseActual - $timestampReserva);

                                if ($diferenciaSegundos < 3600) {
                                    $hayConflicto = true;
                                    break;
                                }
                            }
                        }
                    }
                    ?>

                    <article class="clase-card">
                        <img src="<?= base_url('uploads/clases/' . ($clase['imagen'] ?: 'default.jpg')) ?>" class="clase-image" alt="<?= esc($clase['nombre']) ?>">

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

                        <div class="clase-actions" style="padding: 15px; margin-top: auto;">
                            <?php if ($esMismaClase): ?>
                                <button class="btn-inscribir btn-disabled" disabled style="background-color: #28a745; cursor: default;">
                                    <i class="fas fa-check-circle"></i> Ya Reservada
                                </button>
                            <?php elseif ($hayConflicto): ?>
                                <button class="btn-inscribir btn-disabled" disabled style="background-color: #6c757d; opacity: 0.7; cursor: not-allowed;" title="No puedes reservar clases con menos de 1h de diferencia">
                                    <i class="fas fa-exclamation-triangle"></i> Horario Próximo
                                </button>
                            <?php else: ?>
                                <a href="#"
                                    class="btn-inscribir btn-abrir-modal"
                                    data-url="<?= base_url('clases/reservar/' . $clase['id']) ?>"
                                    data-nombre="<?= esc($clase['nombre']) ?>"
                                    data-hora="<?= date('H:i', strtotime($clase['hora'])) ?>">
                                    Reservar Clase
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-clases">
                    <p>No hay clases disponibles en este momento.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <div id="modal-overlay" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-calendar-check"></i>
                <h2>Confirmar Reserva</h2>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas inscribirte en esta sesión?</p>
                <div id="modal-clase-detalles" class="modal-details">
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn-cancelar" class="btn-secundario">Cancelar</button>
                <a id="btn-confirmar-final" href="#" class="btn-primario">Confirmar Reserva</a>
            </div>
        </div>
    </div>
</body>
<script src="<?= base_url('assets/js/users/confirmar_clases.js') ?>"></script>

</html>