<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/img/logo.png') ?>">

    <!-- STYLES -->

    <style {csp-style-nonce}>
        html, body {
            color: rgba(33, 37, 41, 1);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 16px;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }
    </style>
</head>
<body>

<!-- Header Nav -->
<?= $this->include('partials/header') ?>

<!-- Contenido -->

<!-- Hero -->
<section
    style="
        height: calc(100vh - 80px);
        background-image: url('<?= base_url('assets/img/hero.jpg') ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        padding: 0 20px;
    ">
    <h2 style="font-size: 2.5rem; text-shadow: 2px 2px 8px rgba(0,0,0,0.7); line-height: 1.3;">
        <span style="display: block;">BIENVENIDO A <span style="color: #fed107;">DMN FITNESS</span></span>
        <span style="display: block;  margin-top: 10px;">ENTRENA AL MÁS ALTO NIVEL</span>
        <button style="border-radius: 10px; background-color: #fbd32d; color:#000; padding: 20px; font-size: 35px; font-weight:800; border: 0px; margin-top: 40px
        ;cursor: pointer;" onclick="<?= '/register'; ?>">ÚNETE AHORA</button>
    </h2>
    
</section>

<!-- Info -->
<section style="height: 100vh;">
  <div style="display: flex; height: 100%;">
    
    <div style="
      width: 80%;
      background-color: red;
      clip-path: polygon(100% 0%, 87% 100%, 0% 100%, 0% 0%);
    "></div>

    <div style="
      width: 60%;
      display: flex;
      align-items: center;
      justify-content: center;
    ">
      <img src="" alt="">
    </div>

  </div>
</section>



<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
    <div class="environment">

        <p>Page rendered in {elapsed_time} seconds using {memory_usage} MB of memory.</p>

        <p>Environment: <?= ENVIRONMENT ?></p>

    </div>

    <div class="copyrights">

        <p>&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT
            open source licence.</p>

    </div>

</footer>

<!-- SCRIPTS -->

<script {csp-script-nonce}>
    document.getElementById("menuToggle").addEventListener('click', toggleMenu);
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>

<!-- -->

</body>
</html>
