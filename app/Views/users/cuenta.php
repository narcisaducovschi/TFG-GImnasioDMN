<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMN Fitness | Mi Cuenta</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/users/clases.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/users/cuenta.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <main class="main-content">
        <header class="header-section">
            <h1>Mi Cuenta</h1>
            <p>Gestiona tu información personal y tu suscripción.</p>
        </header>

        <div class="cuenta-container">
            <div class="profile-card">
                <div class="profile-avatar">
                    <?php 
                        // Obtenemos la inicial del nombre de forma segura
                        $inicial = !empty($usuario['nombre']) ? strtoupper(substr($usuario['nombre'], 0, 1)) : 'U';
                        echo $inicial;
                    ?>
                </div>
                <div class="profile-details">
                    <h2 style="margin:0"><?= esc($usuario['nombre'] ?? 'Usuario') ?></h2>
                    <p style="color:var(--text-light); margin: 5px 0 0 0;"><?= esc($usuario['email'] ?? '') ?></p>
                </div>
            </div>

            <div class="subscription-box">
                <div class="plan-info">
                    <div>
                        <h3 style="margin:0">Estado de la Suscripción</h3>
                        <p style="color:var(--text-light); font-size: 0.9rem;">Gestionado de forma segura por Stripe</p>
                    </div>
                    <span class="plan-badge">
                        <i class="fas fa-crown" style="color:#ccaa00"></i> 
                        <?= esc($nombrePlan ?? 'Sin Plan Activo') ?>
                    </span>
                </div>

                <hr style="border: 0; border-top: 1px solid #eee; margin: 1.5rem 0;">

                <p>Desde el portal de clientes puedes:</p>
                <ul style="margin-bottom: 2rem; color: var(--text-light); line-height: 1.8; list-style: none; padding: 0;">
                    <li><i class="fas fa-check" style="color:var(--success-color); margin-right: 10px;"></i> Cancelar tu suscripción en cualquier momento.</li>
                    <li><i class="fas fa-check" style="color:var(--success-color); margin-right: 10px;"></i> Cambiar entre el Plan Básico y Premium.</li>
                    <li><i class="fas fa-check" style="color:var(--success-color); margin-right: 10px;"></i> Actualizar tu método de pago y ver facturas.</li>
                </ul>

                <a href="<?= base_url('portal-suscripcion') ?>" class="btn-portal">
                    <i class="fab fa-stripe"></i> Ir al Portal de Pagos
                </a>
            </div>
        </div>
    </main>
</body>

</html>