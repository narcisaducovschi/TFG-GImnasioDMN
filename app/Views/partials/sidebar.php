<?php

// 1. - Administrador 2. - Trabajador 3. - Profesor 4. - Soporte 5. - Usuario.
// Los que están en grupo en rutas hay que meterles el grupo
// delante del href. 
$session = session();
$role = (int)$session->get('id_rol');
$sidebar_links = [];
switch ($role) {
    case 1:
        $sidebar_links = [
            ['href' => 'admin/setTask', 'icon' => 'tasks.svg', 'text' => 'Asiganar tareas'],
            ['href' => '/chats',    'icon' => 'chats.svg',  'text' => 'Chats'],
            ['href' => '/clasesAdmin',   'icon' => 'calendar.svg', 'text' => 'Gestionar clases'],
            ['href' => '/usersAdmin',   'icon' => 'user.svg',   'text' => 'Gestionar Usuarios'],
            ['href' => '/soporte',  'icon' => 'help.svg',   'text' => 'Soporte'],
        ];
        break;

    case 2:
        $sidebar_links = [
            ['href' => '/users', 'icon' => 'user.svg', 'text' => 'Socios'],
            ['href' => '/tasks',   'icon' => 'tasks.svg',   'text' => 'Tu cuenta'],
        ];
        break;

    case 3:
        $sidebar_links = [
            ['href' => '/clases',  'icon' => 'calendar.svg', 'text' => 'Clases'],
            ['href' => '/chats',   'icon' => 'chats.svg',    'text' => 'Chats'],
        ];
        break;

    case 4:
        $sidebar_links = [
            ['href' => '/support', 'icon' => 'help.svg', 'text' => 'Tickets'],
        ];
        break;

    case 5:
        $sidebar_links = [
            ['href' => '/routines', 'icon' => 'rutina.svg', 'text' => 'Rutinas'],
            ['href' => '/chats',    'icon' => 'chats.svg',  'text' => 'Chats'],
            ['href' => '/clases',   'icon' => 'calendar.svg', 'text' => 'Clases'],
            ['href' => '/cuenta',   'icon' => 'user.svg',   'text' => 'Tu cuenta'],
            ['href' => '/soporte',  'icon' => 'help.svg',   'text' => 'Soporte'],
        ];
        break;
    default:
        $sidebar_links = [
            ['href' => '#', 'icon' => '', 'text' => 'Error: Rol ' . $role . ' no reconocido'],
        ];
        break;
}
?>
<div id="mySidebar">

    <div class="sidebar-logo">
        <a href="<?= base_url('/home') ?>">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo de gimnasio DMN Fitness">
        </a>
    </div>

    <nav class="sidebar-nav">
        <?php foreach ($sidebar_links as $link) { ?>
            <a href="<?= base_url($link['href']) ?>" class="sidebar-link">
                <img src="<?= base_url('assets/img/icons/' . $link['icon']) ?>" alt="">
                <?= $link['text'] ?>
            </a>
        <?php } ?>
    </nav>
</div>