create database dbProduto;

use dbProduto;

create table Produto(
idProduto int primary key auto_increment,
nomeProduto varchar(50) not null,
valorProduto double not null)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO Produto (nomeProduto, valorProduto) VALUES
('Camiseta de Algodão', 29.99),
('Sapatos Esportivos', 69.95),
('Mochila Resistente', 49.99),
('Óculos de Sol', 39.50),
('Fone de Ouvido Bluetooth', 79.99),
('Relógio Analógico', 59.95),
('Notebook Ultrabook', 849.99),
('Câmera Digital Compacta', 199.99),
('Smartphone Android', 299.00),
('Tablet 10 polegadas', 149.99);

select * from Produto;