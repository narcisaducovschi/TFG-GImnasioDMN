<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Bienvenido!! </title>

    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/users/users.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/chats.css') ?>">
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <div id="main-content">
    <div class="chat-container">
        <aside class="chat-sidebar-list">
            <div class="chat-list" id="chatList">
                <div class="chat-item active">
                    <div class="chat-item-header">
                        <span class="chat-name">Matias Bolagay</span>
                        <span class="chat-time">12:00</span>
                    </div>
                    <span class="chat-role">Entrenador/a</span>
                    <p class="chat-preview">No pasa nada, recupérate y vuelve cuando el médico te deje 🔥</p>
                </div>

                <div class="chat-item">
                    <div class="chat-item-header">
                        <span class="chat-name">Danny Sanchez</span>
                        <span class="chat-time">21:47</span>
                    </div>
                    <span class="chat-role">Entrenador/a</span>
                    <p class="chat-preview">Muy bien la técnica...</p>
                </div>
            </div>
        </aside>

        <section class="chat-window">
            <div class="messages-display" id="messagesContainer">
                <div class="msg-row sent">
                    <div class="msg-bubble">
                        <span class="msg-time">10:23</span>
                        <p>Buenos días, el otro día haciendo espalda me lesioné y no voy a poder ir a tu siguiente clase 🙁</p>
                    </div>
                </div>

                <div class="msg-row received">
                    <div class="msg-bubble">
                        <span class="msg-time">12:00</span>
                        <p>No pasa nada, recupérate y vuelve cuando el médico te deje 🔥</p>
                    </div>
                </div>
            </div>

            <div class="chat-input-container">
                <input type="text" placeholder="Escribe tu mensaje aquí..." id="messageInput">
                <button id="sendBtn">Enviar</button>
            </div>
        </section>
    </div>
</div>
    
    <!-- <script src="<?= base_url('assets/js/calcular_imc.js') ?>"></script> -->

</body>

</html>