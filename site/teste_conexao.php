<?php
$db_path = realpath('database/digitalsabor.db');
try {
    $pdo = new PDO('sqlite:' . $db_path);
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
}
?>
