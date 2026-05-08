function confirmResolve(id, asunto) {
    const modal = document.getElementById('resolveModal');
    const form = document.getElementById('resolveForm');
    const info = document.getElementById('modalTicketInfo');

    form.action = "<?= base_url('soporte/resolver/') ?>/" + id;
    info.innerHTML = "<strong>#" + id + " - " + asunto + "</strong>";

    modal.style.display = 'flex';
}

function closeResolveModal() {
    document.getElementById('resolveModal').style.display = 'none';
}

window.onclick = function (event) {
    const modal = document.getElementById('resolveModal');
    if (event.target == modal) {
        closeResolveModal();
    }
}