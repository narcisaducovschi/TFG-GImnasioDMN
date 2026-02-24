<?php
// Obtener la ruta actual
$current_uri = service('uri')->getPath(); // ej: 'routines', 'chats', etc.


$sidebar_links = [
    ['href' => '/routines', 'icon' => 'rutina.svg', 'text' => 'Rutinas'],
    ['href' => '/chats',    'icon' => 'chats.svg',   'text' => 'Chats'],
    ['href' => '/clases',   'icon' => 'calendar.svg','text' => 'Clases'],
    ['href' => '/cuenta',   'icon' => 'user.svg',    'text' => 'Tu cuenta'],
    ['href' => '/soporte',  'icon' => 'help.svg',    'text' => 'Soporte'],
];
?>

<div id="mySidebar">
    
    <div class="sidebar-logo">
        <a href="<?= base_url('/') ?>">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo de gimnasio DMN Fitness">
        </a>
    </div>


    <nav class="sidebar-nav">
        <?php foreach ($sidebar_links as $link){ ?>
            <a href="<?= base_url($link['href']) ?>" 
               class="sidebar-link <?= ($current_uri == ltrim($link['href'], '/')) ? 'active' : '' ?>">
                <img src="<?= base_url('assets/img/icons/' . $link['icon']) ?>" alt="">
                <?= $link['text'] ?>
            </a>
        <?php } ?>
    </nav>
</div>
