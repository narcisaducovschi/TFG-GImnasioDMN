<style>
    #search-input::placeholder {
        color: #fff;
        opacity: 0.8;
        padding-left: 5px;
    }
</style>

<header
    style="
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0px 40px;
        height: 80px;
        box-sizing: border-box;
        background: #000;
    ">
    <div style="display: flex; align-items: center; justify-content:space-between">
        <a href="<?= base_url('/') ?>">
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
        </a>
    </div>

    <div style="display: flex;">

        <input id="search-input" placeholder="Buscar Producto"
            style="
                height: 50px;
                width: 400px;
                border-radius: 10px;
                background-color: #575858;
                color: #fff;
                padding: 0 15px;
                border: none;
                font-size: 16px;
            

            ">
        <button style="background-color: #000;">
            <img
                src="<?= base_url('assets/img/busqueda/LUPAOK.png') ?>"
                alt="Logo de gimnasio DMN Fitness"
                style="
                height: 45px;
                width: 45px;
                object-fit: cover;
            "> </button></input>



    </div>











    <div style="display: flex; gap: 20px;">
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
