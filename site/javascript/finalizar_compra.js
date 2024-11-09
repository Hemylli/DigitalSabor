function finalizarCompra() {
    const success = Math.random() > 0.5; // Simula o sucesso ou falha da compra

    const statusCompra = document.getElementById('status-compra');
    const mensagemStatus = document.getElementById('mensagem-status');
    const checkStatus = document.getElementById('check-status');

    if (success) {
        // Compra bem-sucedida
        statusCompra.classList.remove('painel-falha');
        mensagemStatus.textContent = 'Sua compra foi realizada com sucesso!';
        checkStatus.style.display = 'inline';
        window.location.href = 'finalizar-compra.html';
    } else {
        // Falha na compra
        statusCompra.classList.add('painel-falha');
        mensagemStatus.textContent = 'Ocorreu um erro. Não foi possível concluir a compra. 😞';
        checkStatus.style.display = 'none';
        window.location.href = 'finalizar-compra.html';
    }
}
