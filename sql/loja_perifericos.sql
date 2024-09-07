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
                            (NULL, "Pendrives");

INSERT INTO produtos VALUES (NULL, "Mouse Gamer", "Mouse Gamer", '199.90', "Mouses.webp", 1), 
							(NULL, "Teclado Gamer", "Teclado Gamer", '349.90', "Teclados.jpg", 2),
                            (NULL, "Headset Gamer", "Headset Gamer", '219.90', "Headsets.jpg", 3),
                            (NULL, "Monitor Gamer", "Monitor Gamer", '790.50', "Monitores.webp", 4),
                            (NULL, "Impressora HP", "Impressora HP", '404.10', "Impressoras.avif", 5),
                            (NULL, "Pen Drive HP", "Pen Drive HP", '53.70', "Pendrives.jpeg", 6);
