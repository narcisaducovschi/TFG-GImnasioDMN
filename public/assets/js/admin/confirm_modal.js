let formToSubmit = null;

function openModal(userId) {
    formToSubmit = document.getElementById('form-delete-' + userId);
    document.getElementById('confirm-modal').classList.add('active');
}


document.getElementById('cancel-btn').addEventListener('click', () => {
    document.getElementById('confirm-modal').classList.remove('active');
    formToSubmit = null;
});


document.getElementById('confirm-delete-btn').addEventListener('click', () => {
    if (formToSubmit) {
        formToSubmit.submit();
    }
});


window.onclick = function (event) {
    const modal = document.getElementById('confirm-modal');
    if (event.target == modal) {
        modal.classList.remove('active');
    }
}