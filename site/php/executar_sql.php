<?php
// Caminho do arquivo SQL
$sqlFilePath = '/Applications/XAMPP/htdocs/digital_sabor/database/create_tables.sql';
$dbPath = '/Applications/XAMPP/htdocs/digital_sabor/database/digitalsabor.db'; // Substitua pelo caminho real

try {
    // Conectar ao banco de dados SQLite
    $db = new PDO('sqlite:' . $dbPath);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Carregar o conteúdo do arquivo SQL
    $sql = file_get_contents($sqlFilePath);

    // Executar o SQL para criar as tabelas
    $db->exec($sql);
    echo "Tabelas criadas com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao executar o script SQL: " . $e->getMessage();
}
?>
