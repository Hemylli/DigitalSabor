<?php
try {
    // Define o caminho absoluto onde o arquivo do banco será criado ou localizado
    $dbPath = '/Applications/XAMPP/htdocs/digital_sabor/database/digitalsabor.db';

    // Cria uma nova conexão SQLite
    $pdo = new PDO("sqlite:" . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Carrega os scripts SQL
    $createTablesSQL = file_get_contents(__DIR__ . '/database/scripts/create_tables.sql');
    $insertDataSQL = file_get_contents(__DIR__ . '/database/scripts/insert_data.sql');

    // Executa o SQL para criar as tabelas
    $pdo->exec($createTablesSQL);
    echo "Tabelas criadas com sucesso.<br>";

    // Executa o SQL para inserir os dados
    $pdo->exec($insertDataSQL);
    echo "Dados inseridos com sucesso.<br>";

    echo "Banco de dados configurado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao configurar o banco de dados: " . $e->getMessage();
}
?>
