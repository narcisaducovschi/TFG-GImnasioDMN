<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Chat</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/users/users.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/chats.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #main-content {
            margin-left: 200px;
            width: calc(100% - 200px);
            min-height: 100vh;
            background-color: #f4f7f6;
        }

        .btn-nuevo-chat {
            display: block;
            text-align: center;
            background: #FFD700;
            color: #000;
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
            font-family: 'Montserrat', sans-serif;
            transition: background 0.3s ease;
            text-transform: uppercase;
            font-size: 0.9em;
        }

        .btn-nuevo-chat:hover {
            background: #e6c200;
            color: #000;
        }

        .chat-container {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <?= $this->include('partials/sidebar') ?>

    <div id="main-content">
        <div class="chat-container">
            <aside class="chat-sidebar-list" style="width: 350px; border-right: 1px solid #ddd; background: #fff;">
                <div style="padding: 20px; border-bottom: 1px solid #eee;">
                    <a href="<?= base_url('chats/nuevo') ?>" class="btn-nuevo-chat">
                        + Nuevo Mensaje
                    </a>
                </div>

                <div class="chat-list" id="chatList" style="overflow-y: auto; height: calc(100vh - 100px);">
                    <?php if (!empty($conversaciones)): ?>
                        <?php foreach ($conversaciones as $conv): ?>
                            <a href="<?= base_url('chats/' . $conv['id']) ?>" class="chat-link-<?= $conv['id'] ?>" style="text-decoration:none; color:inherit;">
                                <div class="chat-item <?= (isset($receptor) && $receptor['id'] == $conv['id']) ? 'active' : '' ?>">
                                    <div class="chat-item-header">
                                        <span class="chat-name"><?= esc($conv['nombre']) ?> <?= esc($conv['apellidos']) ?></span>
                                        <span class="chat-time"><?= date('H:i', strtotime($conv['last_time'])) ?></span>
                                    </div>
                                    <span class="chat-role"><?= esc($conv['rol']) ?></span>
                                    <p class="chat-preview"><?= esc($conv['last_msg']) ?></p>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p id="no-chats-msg" style="padding:20px; color:#999; text-align: center;">No hay conversaciones.</p>
                    <?php endif; ?>
                </div>
            </aside>

            <section class="chat-window" style="flex: 1; display: flex; flex-direction: column; background: #fff;">
                <?php if ($receptor): ?>
                    <div style="padding: 15px 25px; border-bottom: 1px solid #eee; background: #fafafa;">
                        <h3 style="margin:0; font-size: 1.1em;"><?= esc($receptor['nombre']) ?> <?= esc($receptor['apellidos']) ?></h3>
                    </div>

                    <div class="messages-display" id="messagesContainer" style="flex: 1; overflow-y: auto; padding: 20px;">
                        <?php foreach ($mensajes as $msg): ?>
                            <div class="msg-row <?= ($msg['id_sender'] == session()->get('user_id')) ? 'sent' : 'received' ?>">
                                <div class="msg-bubble">
                                    <span class="msg-time"><?= date('H:i', strtotime($msg['created_at'])) ?></span>
                                    <p><?= esc($msg['message']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <form id="chatForm" class="chat-input-container">
                        <input type="hidden" id="id_receiver" name="id_receiver" value="<?= $receptor['id'] ?>">
                        <input type="text" name="message" placeholder="Escribe un mensaje..." id="messageInput" autocomplete="off" required>
                        <button type="submit" id="sendBtn">Enviar</button>
                    </form>
                <?php else: ?>
                    <div style="flex: 1; display:flex; align-items:center; justify-content:center; flex-direction: column; color: #999;">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <p>Selecciona un contacto para chatear</p>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const container = document.getElementById('messagesContainer');

            function scrollToBottom() {
                if (container) {
                    container.scrollTop = container.scrollHeight;
                }
            }

            scrollToBottom();

            $(document).on('submit', '#chatForm', function(e) {
                e.preventDefault();

                const message = $('#messageInput').val();
                const receiverId = $('#id_receiver').val();

                if ($.trim(message) === "") return;

                $.ajax({
                    url: '<?= base_url('chat/sendMessage') ?>',
                    type: 'POST',
                    data: {
                        message: message,
                        id_receiver: receiverId
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $('#sendBtn').prop('disabled', true).text('...');
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            const now = new Date();
                            const time = (now.getHours() < 10 ? '0' : '') + now.getHours() + ":" + (now.getMinutes() < 10 ? '0' : '') + now.getMinutes();
                            
                            const newMsg = `
                            <div class="msg-row sent">
                                <div class="msg-bubble">
                                    <span class="msg-time">${time}</span>
                                    <p>${escapeHtml(message)}</p>
                                </div>
                            </div>`;

                            $('#messagesContainer').append(newMsg);
                            $('#messageInput').val('');
                            scrollToBottom();

                        
                            const chatItem = $('.chat-link-' + receiverId);

                            if (chatItem.length) {
                               
                                chatItem.find('.chat-preview').text(message);
                                chatItem.find('.chat-time').text(time);

                               
                                $('#chatList').prepend(chatItem);
                            } else {
                            
                                location.reload();
                            }
                        }
                    },
                    error: function(xhr) {
                        alert("Error al enviar el mensaje.");
                    },
                    complete: function() {
                        $('#sendBtn').prop('disabled', false).text('Enviar');
                    }
                });
            });

            function escapeHtml(text) {
                return text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
            }
        });
    </script>
</body>

</html>