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


