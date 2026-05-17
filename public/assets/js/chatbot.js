
const gymChatToggle = document.getElementById("gymChatToggle")
const gymChatbox = document.getElementById("gymChatbox")
const gymCloseChat = document.getElementById("gymCloseChat")
const gymSendBtn = document.getElementById("gymSendBtn")
const gymChatInput = document.getElementById("gymChatInput")

const URL = `http://127.0.0.1:5000/chatbot/chat`;

// 127.0.0.1 en macos 
// localhost en windows

gymChatToggle.addEventListener("click", () => {
    gymChatbox.classList.toggle("active")
})

gymCloseChat.addEventListener("click", () => {
    gymChatbox.classList.toggle("active")
})

gymSendBtn.addEventListener('click', enviarMensaje)
gymChatInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') enviarMensaje()
})

async function enviarMensaje() {
    const mensaje = gymChatInput.value.trim()

    if (!mensaje) return

    agregarMensaje(mensaje, 'user')
    gymChatInput.value = ''

    try {
        const response = await fetch(URL, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ mensaje: mensaje })
        })

        if (!response.ok) {
            throw new Error(`Error: ${response.status}`)
        }

        const data = await response.json()
        agregarMensaje(data.respuesta, 'bot')
    } catch (error) {
        console.error("Error detallado en la petición:", error)
        agregarMensaje('Se ha producido un error. Prueba a contactar con soporte.', 'bot')
    }
}

function agregarMensaje(texto, tipo) {
    const body = document.getElementById('gymChatBody')
    const div = document.createElement('div')
    div.className = `gym-message ${tipo}`
    div.textContent = texto
    body.appendChild(div)
    body.scrollTop = body.scrollHeight
}