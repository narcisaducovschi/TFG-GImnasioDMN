<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Bienvenido!! </title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/users/users.css') ?>">
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <div class="users-home-container">
        <h2>Tus clases</h2>
        <div class="class-container">
            <div class="class-preview">
                <?php if (!empty($misClases)): ?>
                    <?php foreach ($misClases as $clase): ?>
                        <div class="class">
                            <?php
                            $folder = 'uploads/clases/';
                            $urlImagen = (!empty($clase['imagen'])) ? base_url($folder . $clase['imagen']) : base_url('assets/img/cardio.jpg');
                            ?>

                            <img src="<?= $urlImagen ?>" class="class-banner" alt="<?= esc($clase['nombre_clase'] ?? 'Clase') ?>">

                            <h4><?= esc($clase['nombre_clase'] ?? 'Clase sin nombre') ?></h4>

                            <p>
                                <?= isset($clase['hora']) ? substr($clase['hora'], 0, 5) : '00:00' ?> -
                                <?= esc($clase['dia_semana'] ?? 'Día pendiente') ?>
                            </p>

                            <div class="teacher-container">
                                <img src="<?= base_url('assets/img/icons/school.svg'); ?>" alt="Profesor">
                                <p><?= esc($clase['nombre_profesor'] ?? 'Instructor') ?></p>
                                <a href="<?= base_url('chats') ?>">
                                    <img src="<?= base_url('assets/img/icons/message.svg'); ?>" alt="Mensaje">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-data-message">
                        <p>Aún no estás inscrito en ninguna clase.</p>
                        <a href="<?= base_url('/clases') ?>" class="btn-link">Explorar clases</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="home-bottom-container">
            <div class="routine-preview-container">
                <h2>Tu rutina de hoy: <?= $diaActual ?></h2>
                <div class="routine-preview <?= !empty($ejerciciosHoy) ? 'has-data' : '' ?>">
                    <?php if (!empty($ejerciciosHoy)): ?>
                        <ul class="routine-list">
                            <?php foreach ($ejerciciosHoy as $ejercicio): ?>
                                <li>
                                    <div class="exercise-info">
                                        <strong><?= esc($ejercicio['nombre_ejercicio']) ?></strong>
                                        <span><?= $ejercicio['series'] ?> series x <?= $ejercicio['repeticiones'] ?> reps</span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?= base_url('/routine') ?>" class="btn-ver-mas">Ver rutina completa</a>
                    <?php else: ?>
                        <div class="no-routine-container">
                            <div class="no-routine-icon">
                                <img src="<?= base_url('assets/img/icons/calendar-x.svg'); ?>" alt="Sin rutina">
                            </div>
                            <div class="no-routine-content">
                                <p class="no-routine-title">¡Día de descanso!</p>
                                <p class="no-routine-text">No tienes ejercicios programados para hoy.</p>
                                <a href="<?= base_url('/routine') ?>" class="btn-routine-action">
                                    Planificar mi semana
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="imc-container">
                <div id="imc-header">
                    <h2>Calcula tu IMC</h2>
                    <button type="button" id="open-guia-btn">
                        <img src="<?= base_url('assets/img/icons/info-circle.svg'); ?>" alt="Info IMC">
                    </button>
                </div>
                <form id="imc-form">
                    <div class="form-group">
                        <label for="imc-peso-input">Peso (KG)</label>
                        <input type="number" id="imc-peso-input" placeholder="Ej: 70" min="1">
                    </div>
                    <div class="form-group">
                        <label for="imc-altura-input">Altura (CM)</label>
                        <input type="number" id="imc-altura-input" placeholder="Ej: 172" min="50">
                    </div>
                    <button type="button" id="calcular-imc-btn">Calcular IMC</button>
                    <div id="imc-result"></div>
                </form>

                <div id="guia-modal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <div class="guia">
                            <small>Peso inferior al normal <br> Menos de 18.5 </small>
                            <small>Peso normal <br> Entre 18.5 y 24.9 </small>
                            <small>Peso superior al normal <br> Entre 25.0 y 29.9 </small>
                            <small>Obesidad <br> Más de 30.0</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->include('partials/chatbot') ?>
    </div>

    <script src="<?= base_url('assets/js/chatbot.js') ?>"></script>
    <script src="<?= base_url('assets/js/modal_imc.js') ?>"></script>
    <script src="<?= base_url('assets/js/calcular_imc.js') ?>"></script>
</body>

</html>