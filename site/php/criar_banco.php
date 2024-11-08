<?php
// Caminho absoluto para o banco de dados
$dbPath = '/Applications/XAMPP/htdocs/digital_sabor/database/digitalsabor.db';

try {
    // Conectar ao banco de dados SQLite
    $db = new PDO('sqlite:' . $dbPath);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criar as tabelas
    $sql = "
    CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        sobrenome TEXT NOT NULL,
        classificacao TEXT CHECK(classificacao IN ('admin', 'cliente')) NOT NULL,
        telefone TEXT NOT NULL
    );

    CREATE TABLE IF NOT EXISTS endereco (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        usuario_id INTEGER,
        tipo TEXT NOT NULL,
        cidade TEXT NOT NULL,
        rua TEXT NOT NULL,
        numero TEXT NOT NULL,
        complemento TEXT,
        FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
    );

    CREATE TABLE IF NOT EXISTS produtos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        categoria TEXT NOT NULL,
        preco REAL NOT NULL,
        descricao TEXT NOT NULL,
        imagem TEXT NOT NULL
    );

    CREATE TABLE IF NOT EXISTS pedidos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        usuario_id INTEGER,
        endereco_id INTEGER,
        valor_pago REAL NOT NULL,
        FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
        FOREIGN KEY (endereco_id) REFERENCES endereco(id)
    );

    CREATE TABLE IF NOT EXISTS pedido_produtos (
        pedido_id INTEGER,
        produto_id INTEGER,
        quantidade INTEGER NOT NULL DEFAULT 1,
        FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
        FOREIGN KEY (produto_id) REFERENCES produtos(id),
        PRIMARY KEY (pedido_id, produto_id)
    );
    ";

    // Executar o SQL para criar as tabelas
    $db->exec($sql);
    echo "Banco de dados e tabelas criados com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao criar o banco de dados: " . $e->getMessage();
}
?>
