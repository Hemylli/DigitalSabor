window.onload = function () {
    const carrinho = localStorage.getItem('carrinho');

    if (carrinho) {
        fetch('carrinho.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'carrinho=' + encodeURIComponent(carrinho),
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                console.log('Carrinho sincronizado com sucesso.');
            } else {
                console.error('Erro ao sincronizar o carrinho.');
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
    }
};
