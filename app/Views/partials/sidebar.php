<?php
// Detecta la página actual
$current_page = basename($_SERVER['REQUEST_URI']);

// Define los enlaces del sidebar
$sidebar_links = [
    ['href' => 'rutinas.php', 'icon' => 'rutina.svg', 'text' => 'Rutinas'],
    ['href' => 'chats.php', 'icon' => 'chats.svg', 'text' => 'Chats'],
    ['href' => 'clases.php', 'icon' => 'calendar.svg', 'text' => 'Clases'],
    ['href' => 'cuenta.php', 'icon' => 'user.svg', 'text' => 'Tu cuenta'],
    ['href' => 'soporte.php', 'icon' => 'help.svg', 'text' => 'Soporte'],
];
?>

<div id="mySidebar">
    <!-- Logo -->
    <div class="sidebar-logo">
        <a href="/">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo de gimnasio DMN Fitness">
        </a>
    </div>

    <!-- Navigation links -->
    <nav class="sidebar-nav">
        <?php foreach ($sidebar_links as $link){?>
            <a href="<?= $link['href'] ?>" class="sidebar-link <?= ($current_page == $link['href']) ? 'active' : '' ?>">
                <img src="<?= base_url('assets/img/sidebar-icons/' . $link['icon']) ?>" alt="">
                <?= $link['text'] ?>
            </a>
        <?php } ?>
    </nav>
</div>