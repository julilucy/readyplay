
CREATE DATABASE readyplay;

USE readyplay;

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    nomeusuario VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    genero VARCHAR(15) NOT NULL,
    data_nascimento DATE NOT NULL,
    senha VARCHAR(50) NOT NULL,

);