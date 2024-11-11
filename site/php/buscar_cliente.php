<?php
// buscar_cliente.php

require 'conexao.php';

$celular = preg_replace('/\D/', '', $_GET['celular']);  // Remove caracteres não numéricos

if (strlen($celular) !== 11) {
    echo json_encode(['encontrado' => false]);
    exit();
}

$query = "SELECT * FROM usuarios INNER JOIN endereco on usuarios.id = endereco.usuario_id WHERE celular = :celular";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':celular', $celular);
$stmt->execute();
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);

if ($cliente) {
    echo json_encode([
        'encontrado' => true,
        'nome' => $cliente['nome'],
        'sobrenome' => $cliente['sobrenome'],
        'cidade' => $cliente['cidade'],
        'rua' => $cliente['rua'],
        'numero' => $cliente['numero'],
        'complemento' => $cliente['complemento']
    ]);
} else {
    echo json_encode(['encontrado' => false]);
}

?>
