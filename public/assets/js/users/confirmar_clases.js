document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('modal-overlay');
    const btnsAbrir = document.querySelectorAll('.btn-abrir-modal');
    const btnCancelar = document.getElementById('btn-cancelar');
    const btnConfirmarFinal = document.getElementById('btn-confirmar-final');
    const detallesContenedor = document.getElementById('modal-clase-detalles');

    btnsAbrir.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            const url = this.getAttribute('data-url');
            const nombre = this.getAttribute('data-nombre');
            const hora = this.getAttribute('data-hora');

            detallesContenedor.innerHTML = `Sesión: ${nombre} <br> Hora: ${hora}`;
            btnConfirmarFinal.setAttribute('href', url);

            modal.style.display = 'flex';
        });
    });

    btnCancelar.addEventListener('click', () => {
        modal.style.display = 'none';
    });


    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});