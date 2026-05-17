<!-- ===== CHATBOX GIMNASIO ===== -->

<!-- Botón flotante -->
<div class="gym-chat-toggle" id="gymChatToggle">
    💬
</div>

<!-- Ventana de chat -->
<div class="gym-chatbox" id="gymChatbox">

    <div class="gym-chat-header">
        <div class="gym-chat-title">
            <span class="status-dot"></span>
            Asistente Virtual
        </div>
        <button class="gym-close-btn" id="gymCloseChat">✕</button>
    </div>

    <div class="gym-chat-body" id="gymChatBody">
        <div class="gym-message bot">
            ¡Hola! 💪 Bienvenido al gimnasio. ¿En qué puedo ayudarte?
        </div>
    </div>

    <div class="gym-chat-footer">
        <input type="text" id="gymChatInput" placeholder="Escribe tu mensaje...">
        <button id="gymSendBtn">Enviar</button>
    </div>

</div>

<script src="<?= base_url('assets/js/chatbot.js') ?>"></script>