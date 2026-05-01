<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMN Fitness | Rutina</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/users/routine.css') ?>">
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <div class="routine-wrapper">

        <div class="days">
            <?php
            $mapaDias = [
                'Lunes' => 'L',
                'Martes' => 'M',
                'Miércoles' => 'X',
                'Jueves' => 'J',
                'Viernes' => 'V',
                'Sábado' => 'S',
                'Domingo' => 'D'
            ];

            foreach ($mapaDias as $nombreCompleto => $letra):
                $clase = ($nombreCompleto == $diaActual) ? 'selected' : '';
            ?>
                <a href="<?= base_url('routine?dia=' . $nombreCompleto) ?>" class="<?= $clase ?>">
                    <?= $letra ?>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="routine">
            <?php if (!empty($ejercicios)): ?>
                <div class="routine-header">
                    <div class="title">
                        <h2><?= $diaActual ?></h2>
                        <a href="<?= base_url('routine/edit/' . $diaActual) ?>">
                            <img src="<?= base_url('assets/img/icons/pencil.svg'); ?>">Editar rutina
                        </a>
                    </div>
                    <p><?= $grupoMuscular ?></p>
                </div>

                <?php foreach ($ejercicios as $ex): ?>
                    <div class="exercice">
                        <div class="exercice-container">
                            <h5><?= esc($ex['nombre_ejercicio']) ?></h5>
                            <div class="exercice-info">
                                <div class="exercice-series-reps">
                                    <p>Series: <?= $ex['series'] ?></p>
                                    <p>Repeticiones: <?= $ex['repeticiones'] ?></p>
                                </div>
                                <div class="exercice-notes">
                                    <p>Notas: <?= esc($ex['notas']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php else: ?>
                <div class="no-routine">
                    <h2>No hay rutina para el <?= $diaActual ?></h2>
                    <p>Parece que aún no has planificado este día.</p>
                    <a href="<?= base_url('routine/new?dia=' . $diaActual) ?>" class="btn-create">
                        + Crear rutina de <?= $diaActual ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>