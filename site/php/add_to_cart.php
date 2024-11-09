<?php
session_start();

// Verifica se o carrinho já existe na sessão
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Adiciona o produto ao carrinho
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $_SESSION['cart'][] = $product_id; // Adiciona o ID ao carrinho
}

header('Location: carrinho.php'); // Redireciona para o carrinho
exit();
?>
