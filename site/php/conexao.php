<?php
try {
    $db_path = '/Users/hemylli/Documents/Faculdade/Desenvolvimento Web/Projeto/DigitalSabor/site/database/digitalsabor.db';
    $pdo = new PDO('sqlite:' . $db_path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit();
}
?>
