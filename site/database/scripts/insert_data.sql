-- Inserir usuários
INSERT INTO usuarios (nome, sobrenome, classificacao, telefone) VALUES
('João', 'Silva', 'cliente', '123456789'),
('Maria', 'Oliveira', 'cliente', '987654321'),
('Ana', 'Souza', 'admin', '456789123'),
('Pedro', 'Lima', 'cliente', '321654987'),
('Carla', 'Moraes', 'admin', '654321789');

-- Inserir endereços
INSERT INTO endereco (usuario_id, tipo, cidade, rua, numero, complemento) VALUES
(1, 'Residencial', 'São Paulo', 'Rua A', '123', 'Apto 1'),
(2, 'Residencial', 'São Paulo', 'Rua B', '456', ''),
(3, 'Comercial', 'São Paulo', 'Rua C', '789', 'Sala 2'),
(4, 'Residencial', 'Rio de Janeiro', 'Rua D', '321', 'Casa 3'),
(5, 'Residencial', 'Belo Horizonte', 'Rua E', '654', '');

-- Inserir produtos
INSERT INTO produtos (nome, categoria, preco, descricao, imagem) VALUES
('Feijoada', 'Prato Principal', 29.90, 'Feijoada completa com carne de porco e arroz.', 'feijoada.png'),
('Lasagna', 'Prato Principal', 24.90, 'Lasagna recheada com carne e queijo.', 'lasagna.png'),
('Brigadeiro', 'Sobremesa', 9.90, 'Docinho de chocolate com granulado.', 'brigadeiro.png'),
('Torta de Limão', 'Sobremesa', 12.50, 'Torta com creme de limão e merengue.', 'torta_limao.png'),
('Coca-Cola', 'Bebida', 5.00, 'Refrigerante de cola.', 'coca_cola.png'),
('Pizza Margherita', 'Prato Principal', 29.90, 'Pizza com tomate, queijo e manjericão.', 'pizza_margherita.png'),
('Pavê de Chocolate', 'Sobremesa', 14.90, 'Sobremesa de biscoito e chocolate.', 'pave_chocolate.png'),
('Suco de Laranja', 'Bebida', 7.00, 'Suco natural de laranja.', 'suco_laranja.png'),
('Estrogonofe de Frango', 'Prato Principal', 32.00, 'Frango ao molho cremoso com arroz.', 'estrogonofe_frango.png'),
('Sorvete de Baunilha', 'Sobremesa', 8.50, 'Sorvete cremoso de baunilha.', 'sorvete_baunilha.png'),
('Cerveja', 'Bebida', 6.50, 'Cerveja lager.', 'cerveja.png'),
('Sopa de Cebola', 'Prato Principal', 18.00, 'Sopa quente de cebola com queijo.', 'sopa_cebola.png'),
('Pudim', 'Sobremesa', 10.00, 'Pudim de leite condensado.', 'pudim.png'),
('Sanduíche de Frango', 'Prato Principal', 15.00, 'Sanduíche com peito de frango grelhado.', 'sandwich_frango.png'),
('Água Mineral', 'Bebida', 3.00, 'Água mineral com gás.', 'agua.png'),
('Quiche de Queijo', 'Prato Principal', 20.00, 'Quiche recheada com queijo e ervas.', 'quiche_queijo.png'),
('Torta de Morango', 'Sobremesa', 13.00, 'Torta com morangos frescos.', 'torta_morango.png'),
('Mousse de Maracujá', 'Sobremesa', 11.00, 'Mousse leve de maracujá.', 'mousse_maracuja.png'),
('Chá Gelado', 'Bebida', 4.50, 'Chá gelado sabor limão.', 'cha_gelado.png'),
('Hambúrguer', 'Prato Principal', 18.50, 'Hambúrguer de carne com queijo.', 'hamburguer.png'),
('Bolo de Cenoura', 'Sobremesa', 9.00, 'Bolo de cenoura com cobertura de chocolate.', 'bolo_cenoura.png');

-- Inserir pedidos
INSERT INTO pedidos (usuario_id, endereco_id, valor_pago) VALUES
(1, 1, 35.90),  -- Pedido de Feijoada e Coca-Cola
(2, 2, 36.40),  -- Pedido de Pizza Margherita e Pavê de Chocolate
(4, 4, 38.50),  -- Pedido de Sorvete de Baunilha e Torta de Limão
(3, 3, 14.50);  -- Pedido de Cerveja

-- Inserir produtos nos pedidos
INSERT INTO pedido_produtos (pedido_id, produto_id, quantidade) VALUES
(1, 1, 1),  -- Feijoada
(1, 5, 1),  -- Coca-Cola
(2, 6, 1),  -- Pizza Margherita
(2, 7, 1),  -- Pavê de Chocolate
(3, 11, 1), -- Sorvete de Baunilha
(3, 4, 1),  -- Torta de Limão
(4, 12, 1); -- Cerveja
