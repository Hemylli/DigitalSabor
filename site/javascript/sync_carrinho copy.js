document.addEventListener("DOMContentLoaded", function() {
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

    // Só sincroniza se houver itens no carrinho e ainda não tiver sido sincronizado
    if (carrinho.length > 0 && !sessionStorage.getItem('carrinhoSincronizado')) {
        fetch('carrinho.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ carrinho: carrinho })  // Envia o carrinho para o PHP
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                sessionStorage.setItem('carrinhoSincronizado', 'true');
                atualizarCarrinho(carrinho);  // Atualiza o frontend com os itens do carrinho
            }
        })
        .catch(error => console.error('Erro ao sincronizar o carrinho:', error));
    }
});

function atualizarCarrinho(carrinho) {
    const tabelaCorpo = document.querySelector("tbody");
    tabelaCorpo.innerHTML = "";  // Limpa a tabela antes de atualizá-la

    carrinho.forEach((item, index) => {
        const linha = `
            <tr>
                <td>${item.nome}</td>
                <td>R$ ${parseFloat(item.preco).toFixed(2).replace('.', ',')}</td>
                <td>${item.quantidade}</td>
                <td><a href="?remover=${index}" class="remover">Remover</a></td>
            </tr>
        `;
        tabelaCorpo.insertAdjacentHTML('beforeend', linha);
    });

    atualizarTotal(carrinho);  // Atualiza o total do carrinho
}

function atualizarTotal(carrinho) {
    let total = 0;
    carrinho.forEach(item => {
        total += item.preco * item.quantidade;
    });

    document.querySelector('.total p').textContent = `Total: R$ ${total.toFixed(2).replace('.', ',')}`;
}
