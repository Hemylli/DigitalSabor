const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

// Função para atualizar a contagem do ícone do carrinho
function atualizarContagemCarrinho() {
    const carrinhoCount = carrinho.length;
    const cartIcon = document.querySelector('.btn-cart span');
    if (cartIcon) {
        cartIcon.textContent = carrinhoCount;
    }
}

// Adicionar ao carrinho
document.querySelectorAll('.btn-buy').forEach(btn => {
    btn.addEventListener('click', function() {
        const produto = {
            id: this.dataset.id,
            nome: this.dataset.nome,
            preco: this.dataset.preco
        };
        carrinho.push(produto);
        localStorage.setItem('carrinho', JSON.stringify(carrinho));
        atualizarContagemCarrinho();
        
    });
});

// Atualizar a contagem ao carregar a página
atualizarContagemCarrinho();

function adicionarAoCarrinho(nome, preco) {
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

    // Verifica se o produto já está no carrinho
    const produtoIndex = carrinho.findIndex(item => item.nome === nome);

    if (produtoIndex >= 0) {
        // Se o produto já estiver no carrinho, aumenta a quantidade
        carrinho[produtoIndex].quantidade += 1;
    } else {
        // Se o produto não estiver no carrinho, adiciona um novo item com quantidade 1
        carrinho.push({
            nome: nome,
            preco: preco,
            quantidade: 1
        });
    }

    // Salva o carrinho atualizado no localStorage
    localStorage.setItem('carrinho', JSON.stringify(carrinho));

    // Atualiza a contagem no ícone do carrinho
    atualizarContagemCarrinho();
}



