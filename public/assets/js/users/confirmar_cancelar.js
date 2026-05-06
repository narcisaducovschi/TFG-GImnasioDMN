document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modal-cancelar-overlay');
    const triggers = document.querySelectorAll('.btn-cancelar-trigger');
    const btnCerrar = document.getElementById('btn-cerrar-cancelar');
    const btnConfirmar = document.getElementById('btn-confirmar-borrado');
    const infoContenedor = document.getElementById('detalles-cancelacion');

    triggers.forEach(btn => {
        btn.addEventListener('click', function () {
            const url = this.getAttribute('data-url');
            const nombre = this.getAttribute('data-nombre');
            const fecha = this.getAttribute('data-fecha');

            infoContenedor.innerHTML = `<strong>${nombre}</strong><br>Fecha: ${fecha}`;

            btnConfirmar.setAttribute('href', url);
            modal.style.display = 'flex';
        });
    });

    btnCerrar.addEventListener('click', () => modal.style.display = 'none');

    window.addEventListener('click', (e) => {
        if (e.target === modal) modal.style.display = 'none';
    });
});