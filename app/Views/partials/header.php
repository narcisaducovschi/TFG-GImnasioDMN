<header
    style="
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        height: 80px;
        box-sizing: border-box;
        background: #000;
    ">
    <div style="display: flex; align-items: center; justify-content:space-between">
        <img
            src="<?= base_url('assets/img/logo.png') ?>"
            alt="Logo de gimnasio DMN Fitness"
            style="
                height: 100px;
                width: auto;
                object-fit: contain;
                display: block;
                padding-top: 10px
            ">
    </div>

    <div style="display: flex; gap: 20px;">
        <a
            href="/shop"
            style="text-decoration: none; color: #fff; font-weight: 200;"
            onmouseover="this.style.textDecoration='underline'"
            onmouseout="this.style.textDecoration='none'">
            Tienda
        </a>
        <a
            href="/login"
            style="text-decoration: none; color: #fff; font-weight: 200;"
            onmouseover="this.style.textDecoration='underline'"
            onmouseout="this.style.textDecoration='none'">
            Iniciar Sesión
        </a>
        <a
            href="/register"
            style="text-decoration: none; color: #fff; font-weight: 200;"
            onmouseover="this.style.textDecoration='underline'"
            onmouseout="this.style.textDecoration='none'">
            Registrarse
        </a>
    </div>
</header>