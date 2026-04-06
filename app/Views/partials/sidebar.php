<?php
$current_uri = trim(service('uri')->getPath(), '/'); 
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
        <a href="<?= base_url('/home') ?>">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo de gimnasio DMN Fitness">
        </a>
    </div>

<nav class="sidebar-nav">
    <?php foreach ($sidebar_links as $link){ 
        // Limpiamos también el href del array para comparar "peras con peras"
        $link_path = trim($link['href'], '/');
        $active_class = ($current_uri == $link_path) ? 'active' : '';
    ?>
        <a href="<?= base_url($link['href']) ?>" class="sidebar-link <?= $active_class ?>">
            <img src="<?= base_url('assets/img/icons/' . $link['icon']) ?>" alt="">
            <?= $link['text'] ?>
        </a>
    <?php } ?>
</nav>
</div>
