document.addEventListener('DOMContentLoaded', () => {
    const openBtn = document.getElementById('open-guia-btn');
    const modal = document.getElementById('guia-modal');
    const closeBtn = modal.querySelector('.close');

    // Abrir modal
    openBtn.addEventListener('click', () => {
        modal.style.display = 'flex';
    });

    // Cerrar modal con la X
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Cerrar modal si se hace clic fuera del contenido
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});