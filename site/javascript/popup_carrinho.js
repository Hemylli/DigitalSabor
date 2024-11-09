function removerItem() {
    // Exibe o popup com a mensagem de sucesso
    showPopup('Item removido com sucesso!');
}

function showPopup(message) {
    const popup = document.getElementById('popup');
    const popupMessage = document.getElementById('popup-message');
    popupMessage.textContent = message;
    popup.style.display = 'flex';

    // Fecha o popup ao clicar no "X"
    const closeBtn = document.getElementById('popup-close');
    closeBtn.onclick = function() {
        popup.style.display = 'none';
    };

    // Fecha o popup automaticamente após 3 segundos
    setTimeout(function() {
        popup.style.display = 'none';
    }, 3000);
}
