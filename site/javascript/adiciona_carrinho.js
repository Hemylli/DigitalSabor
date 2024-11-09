// Função para adicionar um produto ao carrinho
function adicionarAoCarrinho(nome, preco) {
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

    // Verifica se o produto já está no carrinho
    const produtoIndex = carrinho.findIndex(item => item.nome === nome);

    if (produtoIndex >= 0) {
        // Se o produto já estiver no carrinho, aumenta a quantidade
        carrinho[produtoIndex].quantidade += 1;
    } else {
        // Se o produto não estiver no carrinho, adiciona um novo item
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

// Atualiza a contagem no ícone do carrinho
function atualizarContagemCarrinho() {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    const carrinhoCount = carrinho.reduce((total, item) => total + item.quantidade, 0);  // Soma as quantidades
    const cartIcon = document.querySelector('.btn-cart span');
    if (cartIcon) {
        cartIcon.textContent = carrinhoCount;
    }
}

// Adicionar ao carrinho ao clicar no botão
document.querySelectorAll('.btn-buy').forEach(btn => {
    btn.addEventListener('click', function() {
        const nome = this.dataset.nome;
        const preco = this.dataset.preco;
        adicionarAoCarrinho(nome, preco);
    });
});

// Atualizar a contagem ao carregar a página
atualizarContagemCarrinho();
