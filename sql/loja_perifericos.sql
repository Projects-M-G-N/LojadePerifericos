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

CREATE TABLE categorias (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE produtos (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    imagem VARCHAR(255),
    categoria INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (categoria)
		REFERENCES categorias (id)
);

INSERT INTO categorias VALUES (NULL, "Mouses"), 
							(NULL, "Teclados"), 
                            (NULL, "Headsets"), 
                            (NULL, "Monitores"), 
                            (NULL, "Impressoras"), 
                            (NULL, "Pen Drives");

INSERT INTO produtos VALUES (NULL, "Mouse Gamer", "Mouse Gamer", '199.90', "66b0b8ff20f11.webp", 1), 
							(NULL, "Teclado Gamer", "Teclado Gamer", '349.90', "66b0b9803f3f9.jpg", 2),
                            (NULL, "Headset Gamer", "Headset Gamer", '219.90', "66b0b9c567d56.jpg", 3),
                            (NULL, "Monitor Gamer", "Monitor Gamer", '790.50', "66b0ba4034d0f.webp", 4),
                            (NULL, "Impressora HP", "Impressora HP", '404.10', "66b0baafb2bf6.avif", 5),
                            (NULL, "Pen Drive HP", "Pen Drive HP", '53.70', "66b0bb2f3f50a.jpeg", 6);
