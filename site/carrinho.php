<?php
session_start();

// Função para calcular o total
function calcularTotal($carrinho)
{
    $total = 0;
    foreach ($carrinho as $item) {
        $total += $item['preco'] * $item['quantidade'];
    }
    return number_format($total, 2, ',', '.');
}

// Função para remover item
if (isset($_GET['remover'])) {
    $index = $_GET['remover'];
    unset($_SESSION['carrinho'][$index]);
    header("Location: carrinho.php"); // Redireciona após remover o item
    exit;
}

// Se o carrinho não existe na sessão, cria um
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Se os dados do carrinho forem enviados via POST (do localStorage)
if (isset($_POST['carrinho'])) {
    // Recebe o carrinho enviado via POST e armazena na sessão
    $_SESSION['carrinho'] = json_decode($_POST['carrinho'], true);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras - Digital Sabor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/cart.css">
    <script src="js/script.js" defer></script>
</head>

<body>
    <!-- Menu de navegação igual ao index.php -->
    <header>
        <nav id="navbar">
            <img src="images/logo.png" alt="Logo da Empresa" class="nav_logo">
            <ul id="nav_list">
                <li class="nav-item"><a href="index.php">Início</a></li>
                <li class="nav-item"><a href="index.php">Cardápio</a></li>
                <li class="nav-item"><a href="sobrenos.html">Sobre Nós</a></li>
            </ul>
            <button id="mobile_btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </nav>
    </header>

    <section class="carrinho">
        <h1>Carrinho de Compras</h1>
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_SESSION['carrinho'])): ?>
                    <?php foreach ($_SESSION['carrinho'] as $index => $item): ?>
                        <!-- Limpar carrinho -->
                        <button class="limpar-carrinho" id="limpar-carrinho" onclick="limparCarrinho()">Limpar Carrinho</button>
                        <tr>
                            <td><?php echo htmlspecialchars($item['nome']); ?></td>
                            <td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
                            <td><?php echo $item['quantidade']; ?></td>
                            <td><a href="?remover=<?php echo $index; ?>" class="remover">Remover</a></td>
                        </tr>

                        <div class="total">
                            <p>Total: R$ <?php echo calcularTotal($_SESSION['carrinho']); ?></p>
                            <button class="finalizar" onclick="finalizarCompra()">
                                <a href="finalizar_compra.html" style="color: white">Finalizar Compra</a>
                            </button>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Carrinho vazio</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?php if (!empty($_SESSION['carrinho'])): ?>
            <?php foreach ($_SESSION['carrinho'] as $index => $item): ?>
                <div class="total">
                    <p>Total: R$ <?php echo calcularTotal($_SESSION['carrinho']); ?></p>
                    <button class="finalizar" onclick="finalizarCompra()">
                        <a href="finalizar_compra.html" style="color: white">Finalizar Compra</a>
                    </button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </section>

    <footer>
        <div id="footer_items">
            <span id="copyright">&copy 2024 Digital Sabor</span>
            <div class="social-media-buttons">
                <a href=""><i class="fa-brands fa-whatsapp"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>
    </footer>

    <script src="javascript/popup_carrinho.js"></script>
    <script src="javascript/armazena_carrinho.js"></script>
    <script src="javascript/atualiza_carrinho.js"></script>
    <script src="javascript/finalizar_compra.js"></script>

    <script>
        // Função para limpar o carrinho
        function limparCarrinho() {
            localStorage.removeItem('carrinho'); // Limpa o carrinho do localStorage
            sessionStorage.removeItem('carrinho'); // Limpa o carrinho da sessão
            window.location.reload(); // Atualiza a página
        }
    </script>

</body>

</html>