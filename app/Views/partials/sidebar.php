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
            ['href' => 'admin/clasesAdmin',   'icon' => 'calendar.svg', 'text' => 'Gestionar clases'],
            ['href' => 'admin/usersAdmin',   'icon' => 'user.svg',   'text' => 'Gestionar Usuarios'],
            ['href' => 'admin/ticketsAdmin',  'icon' => 'help.svg',   'text' => 'Supervisión Soporte'],
        ];
        break;

    case 2:
        $sidebar_links = [
            ['href' => '/users', 'icon' => 'user.svg', 'text' => 'Socios'],
            ['href' => '/chats',    'icon' => 'chats.svg',  'text' => 'Chats'],
            ['href' => '/worker/myTasks',   'icon' => 'tasks.svg',   'text' => 'Mis tareas'],
            ['href' => '/tickets',  'icon' => 'help.svg',   'text' => 'Soporte'],
        ];
        break;

    case 3:
        $sidebar_links = [
            ['href' => 'teacher/misClases', 'icon' => 'calendar.svg', 'text' => 'Mis Clases'],
            ['href' => 'chats',              'icon' => 'chats.svg',    'text' => 'Chats'],
            ['href' => 'tickets',            'icon' => 'help.svg',     'text' => 'Soporte'],
        ];
        break;

    case 4:
        $sidebar_links = [
            ['href' => 'soporte/pendientes', 'icon' => 'help.svg', 'text' => 'Bandeja Entrada'],
            ['href' => 'soporte/mis-casos',  'icon' => 'tasks.svg', 'text' => 'Mis Asignaciones'],
            ['href' => 'chats',              'icon' => 'chats.svg', 'text' => 'Chats'],
        ];
        break;

    case 5:
        $sidebar_links = [
            ['href' => '/home', 'icon' => 'home.svg', 'text' => 'Home'],
            ['href' => '/routine', 'icon' => 'rutina.svg', 'text' => 'Rutinas'],
            ['href' => '/chats',    'icon' => 'chats.svg',  'text' => 'Chats'],
            ['href' => '/clases',   'icon' => 'calendar.svg', 'text' => 'Reservar clases'],
            ['href' => '/misClases',   'icon' => 'reserva.svg', 'text' => 'Mis clases'],
            ['href' => '/cuenta',   'icon' => 'user.svg',   'text' => 'Tu cuenta'],
            ['href' => '/tickets',  'icon' => 'help.svg',   'text' => 'Soporte'],
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
        <a href="<?= base_url('/') ?>">
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