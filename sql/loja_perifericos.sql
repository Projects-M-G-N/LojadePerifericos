CREATE DATABASE loja_perifericos;

USE loja_perifericos;

CREATE TABLE clientes (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    endereco VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE produtos (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    imagem VARCHAR(255),
    categoria VARCHAR(50),
    PRIMARY KEY (id)
);

CREATE TABLE categorias (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE produtos_categorias (
    produto_id INT NOT NULL,
    categoria_id INT NOT NULL,
    PRIMARY KEY (produto_id, categoria_id),
    FOREIGN KEY (produto_id) REFERENCES produtos(id),
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);
