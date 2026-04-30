<header class="main-header">

    <style>
        .main-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            height: 80px;
            background: #000;
            box-sizing: border-box;
        }

        .logo-container img {
            height: 180px;
            margin-top: 30px;
            width: auto;
            object-fit: contain;
        }

        .header-links {
            display: flex;
            gap: 20px;
        }

        /* Botones estilo COMPRA YA */
        .header-btn {
            display: inline-block;
            background-color: #FFD000;
            color: #000;
            font-weight: 700;
            text-transform: uppercase;
            padding: 10px 22px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.25s ease;
        }

        .header-btn:hover {
            background-color: #e6bc00;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 208, 0, 0.4);
        }
    </style>

    <div class="logo-container">
        <a href="/">
            <img src="<?= base_url('assets/img/logo.png') ?>"
                alt="Logo de gimnasio DMN Fitness">
        </a>
    </div>

    <div class="header-links">
        <?php if (uri_string() !== 'shop'): ?>
            <a href="/shop" class="header-btn">Tienda</a>
        <?php endif; ?>

        <?php if (session()->get('isLoggedIn')): ?>
            <a href="<?= base_url('logout') ?>" class="header-btn" style="background-color: #ff4d4d; color: white;">Cerrar Sesión</a>
        <?php else: ?>
            <a href="/login" class="header-btn">Iniciar Sesión</a>
            <a href="/register" class="header-btn">Registrarse</a>
        <?php endif; ?>
    </div>

</header>