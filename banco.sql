CREATE DATABASE insumos;
USE insumos;

CREATE TABLE insumo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    unidade VARCHAR(50) NOT NULL,
    estoque_atual INT NOT NULL CHECK (estoque_atual >= 0),
    preco DECIMAL(10,2) NOT NULL CHECK (preco >= 0)
);