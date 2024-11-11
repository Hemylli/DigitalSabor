<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras - Digital Sabor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/cart.css">
    <link rel="stylesheet" href="styles/form_cadastro.css">
    <script src="js/script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <!-- Menu de navegação igual ao index.php -->
    <header>
        <nav id="navbar">
            <img src="images/logo.png" alt="Logo da Empresa" class="nav_logo">

            <ul id="nav_list">
                <li class="nav-item">
                    <a href="index.php">Início</a>
                </li>
                <li class="nav-item">
                    <a href="index.php">Cardápio</a>
                </li>
                <li class="nav-item">
                    <a href="sobrenos.html">Sobre Nós</a>
                </li>
            </ul>

            <button id="mobile_btn">
                <i class="fa-solid fa-bars"></i>
            </button>

        </nav>

        <div id="mobile_menu">
            <ul id="mobile_nav_list">
                <li class="nav-item">
                    <a href="index.php">Início</a>
                </li>
                <li class="nav-item">
                    <a href="index.php">Cardápio</a>
                </li>
                <li class="nav-item">
                    <a href="sobrenos.html">Sobre Nós</a>
                </li>
            </ul>

            <button class="btn-default">
                <a href="index.php">Peça aqui</a>
            </button>
        </div>
    </header>

    <div class="container">
        <form action="/pagina cadastro cliente" method="post" class="cadastro-form" id="formCadastro">
            <fieldset>
                <legend>Contato</legend>
                <label for="celular">Número de Celular (com Whatsapp):</label>
                <input type="tel" id="celular" maxlength="11" required placeholder="(xx) xxxxx-xxxx"/>
                <small>Formato: 12345678910</small>
            </fieldset>
            <fieldset>
                <legend>Identificação</legend>
                <label for="nome">Nome:</label>
                <input type="text" pattern="[A-Za-z]+" title="Por favor, digite apenas letras." minlength="3"
                    maxlength="20" id="nome" required />
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" minlength="5" maxlength="30" id="sobrenome" required />
            </fieldset>
            <fieldset>
                <legend>Endereço</legend>
                <label for="cidade_endereco">Cidade:</label>
                <input type="text" id="cidade_endereco" required />
                <label for="rua_endereco">Rua:</label>
                <input type="text" id="rua_endereco" required />
                <label for="numero_endereco">Número:</label>
                <input type="number" id="numero_endereco" required />
                <label for="complemento_endereco">Complemento:</label>
                <input type="text" id="complemento_endereco" />
            </fieldset>
            <fieldset>
                <button class="finalizar">
                    <a href="finalizar_compra.html">Finalizar Compra</a>
                </button>
            </fieldset>
        </form>
    </div>

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

    <script src="javascript/cadastro.js" defer></script>
    <script src="javascript/script.js" ></script>

</body>

</html>