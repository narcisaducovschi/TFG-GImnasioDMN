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
        <a href="/shop" class="header-btn">Tienda</a>
        <a href="/login" class="header-btn">Iniciar Sesión</a>
        <a href="/register" class="header-btn">Registrarse</a>
    </div>

</header>



<!--
ANTIGUO ESTILO DEL HEADER

<header style="
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        height: 80px;
        box-sizing: border-box;
        background: #000;
    ">

    <div style="display: flex; align-items: center; justify-content:space-between">
        <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo de gimnasio DMN Fitness" style="
                height: 170px;
                width: auto;
                object-fit: contain;
                display: block;
                padding-top: 20px
            ">
    </div>

    <div style="display: flex; gap: 20px;">
        <a href="/shop" style="text-decoration: none; color: #fff; font-weight: 200;"
            onmouseover=" this.style.textDecoration='underline'"
            onmouseout=" this.style.textDecoration='none'">
            Tienda
        </a>
        <a
            href=" /login" style="text-decoration: none; color: #fff; font-weight: 200;"
            onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
            Iniciar Sesión
        </a>
        <a href="/register" style="text-decoration: none; color: #fff; font-weight: 200;"
            onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
            Registrarse
        </a>
    </div>
</header>
-->