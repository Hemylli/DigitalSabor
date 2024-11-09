<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/btn_cart.css">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="styles/menu.css">
    <link rel="stylesheet" href="styles/aboutus.css">
    <link rel="stylesheet" href="styles/footer.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Digital Sabor</title>
</head>

<body>
    <!-- CONEXAO PHP -->
    <?php include 'php/conexao.php'; ?>

    <header>
        <nav id="navbar">
            <img src="images/logo.png" alt="Logo da Empresa" class="nav_logo">

            <ul id="nav_list">
                <li class="nav-item active">
                    <a href="#home">Início</a>
                </li>
                <li class="nav-item">
                    <a href="#menu">Cardápio</a>
                </li>
                <li class="nav-item">
                    <a href="sobrenos.html">Sobre Nós</a>
                </li>
            </ul>

            <!-- Ícone de Carrinho de Compras -->
            <button class="btn-cart">
                <a href="carrinho.html">
                    <i class="fa-solid fa-cart-shopping"></i> Carrinho
                </a>
            </button>

            <button id="mobile_btn">
                <i class="fa-solid fa-bars"></i>
            </button>

        </nav>

        <div id="mobile_menu">
            <ul id="mobile_nav_list">
                <li class="nav-item active">
                    <a href="#home">Início</a>
                </li>
                <li class="nav-item">
                    <a href="#menu">Cardápio</a>
                </li>
                <li class="nav-item">
                    <a href="#aboutus">Sobre Nós</a>
                </li>
            </ul>

        </div>
    </header>

    <main id="content">
        <section id="home">
            <div class="shape"></div>
            <div id="cta">
                <h1 class="title">
                    Sabores entregues a você
                </h1>

                <p class="description">
                    Digital Sabor é o seu destino online para uma deliciosa fusão entre culinária e tecnologia.
                </p>

                <div id="cta_buttons">
                    <a href="#" class="btn-default">
                        Ver cardápio
                    </a>

                    <a href="tel:+55555555555" id="phone_button">
                        <button class="btn-default">
                            <i class="fa-solid fa-phone"></i>
                        </button>
                        (55) 95555-5555
                    </a>
                </div>

                <div class="social-media-buttons">
                    <a href="">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                    <a href="">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                </div>
            </div>

            <div id="banner">
                <img src="images/supercomidas.png" alt="">
            </div>
        </section>

        <!-- INICIO CARDAPIO DINAMICO -->
        <section class="menu" id="menu">
            <h2 class="section-title">Cardápio</h2>
            <h3 class="section-subtitle">Nossos pratos</h3>

            <div class="box-container">
                <?php
                // Consultar os pratos no banco de dados
                $stmt = $pdo->query("SELECT nome, descricao, imagem, preco FROM produtos");
                while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // Montar o caminho completo da imagem
                    $imagemCaminho = "images/cardapio/" . $produto['imagem'];
                    echo "
            <div class='dish'>
                <div class='dish-heart'>
                    <i class='fa-solid fa-heart'></i>
                </div>

                <img src='$imagemCaminho' class='dish-image' alt='Imagem do prato'>

                <h3 class='dish-title'>{$produto['nome']}</h3>

                <span class='dish-description'>{$produto['descricao']}</span>

                <div class='dish-rate'>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star'></i>
                    <span>(350+)</span>
                </div>

                <div class='dish-price'>
                    <h4>R$ " . number_format($produto['preco'], 2, ',', '.') . "</h4>
                    <button class='btn-default' id='btn-buy'>
                        <i class='fa-solid fa-basket-shopping'></i>
                    </button>
                </div>
            </div>";
                }
                ?>
            </div>
        </section>
        <!-- FIM CARDAPIO DINAMICO -->
    </main>

    <footer>
        <div id="footer_items">
            <span id="copyright">
                &copy 2024 Digital Sabor
            </span>

            <div class="social-media-buttons">
                <a href="">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>

                <a href="">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </div>

        </div>
    </footer>

    <script src="javascript/script.js"></script>
</body>

</html>