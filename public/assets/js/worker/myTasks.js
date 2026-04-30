const modal = document.getElementById('complete-modal');
const form = document.getElementById('form-confirm-complete');

function openCompleteModal(actionUrl) {
    form.action = actionUrl;
    modal.classList.add('active');
}

function closeCompleteModal() {
    modal.classList.remove('active');
}

window.onclick = function (event) {
    if (event.target == modal) {
        closeCompleteModal();
    }
}