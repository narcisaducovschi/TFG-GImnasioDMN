<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Nuevo Chat</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/users/users.css') ?>">
    <style>
        /* Ajuste fundamental para el Sidebar */
        #main-content {
            margin-left: 200px; /* Ancho de tu sidebar */
            padding: 40px;
            min-height: 100vh;
            background-color: #f8f9fa;
            font-family: 'Montserrat', sans-serif;
        }

        .header-nuevo {
            margin-bottom: 30px;
            border-left: 5px solid #FFD700; /* Amarillo Empresa */
            padding-left: 15px;
        }

        .user-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .user-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            color: #333;
            display: block;
            border: 1px solid #eee;
        }

        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
            border-color: #FFD700;
        }

        .user-avatar {
            width: 60px;
            height: 60px;
            background: #FFD700;
            color: #000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-weight: bold;
            font-size: 1.5em;
        }

        .user-name {
            display: block;
            font-weight: 700;
            font-size: 1.1em;
            margin-bottom: 5px;
        }

        .user-role {
            font-size: 0.85em;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-volver {
            display: inline-block;
            margin-bottom: 20px;
            color: #666;
            text-decoration: none;
            font-size: 0.9em;
        }
        
        .btn-volver:hover {
            color: #000;
        }
    </style>
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <div id="main-content">
        <a href="<?= base_url('chats') ?>" class="btn-volver">← Volver a mis chats</a>
        
        <div class="header-nuevo">
            <h2 style="margin:0;">Iniciar nueva conversación</h2>
            <p style="color: #666;">Selecciona a un miembro del equipo o socio para escribirle.</p>
        </div>

        <div class="user-grid">
            <?php foreach ($usuarios as $u){?>
                <a href="<?= base_url('chats/' . $u['id']) ?>" class="user-card">
                    <div class="user-avatar">
                        <?= strtoupper(substr($u['nombre'], 0, 1)) ?>
                    </div>
                    <span class="user-name"><?= esc($u['nombre']) ?> <?= esc($u['apellidos']) ?></span>
                    <span class="user-role"></span>
                </a>
            <?php } ?>
        </div>
    </div>
</body>

</html>