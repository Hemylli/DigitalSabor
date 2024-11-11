const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];


// Função para limpar o carrinho
function limparCarrinho() {
    localStorage.removeItem('carrinho'); // Remove o carrinho do localStorage
    atualizarContagemCarrinho(); // Atualiza a contagem do carrinho no ícone
}

// Atualiza a contagem do ícone do carrinho
function atualizarContagemCarrinho() {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    const carrinhoCount = carrinho.length;
    const cartIcon = document.querySelector('.btn-cart span');
    if (cartIcon) {
        cartIcon.textContent = carrinhoCount;
    }
}

// Chama a função de atualizar ao carregar a página
atualizarContagemCarrinho();

// Se você tiver um botão para limpar o carrinho, adicione um evento de clique:
const limparCarrinhoBtn = document.getElementById('limpar-carrinho');
if (limparCarrinhoBtn) {
    limparCarrinhoBtn.addEventListener('click', function() {
        limparCarrinho();
        alert('Carrinho limpo com sucesso!');
        location.reload(); // Atualiza a página
    });
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
