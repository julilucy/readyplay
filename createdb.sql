CREATE DATABASE readyplay;

USE readyplay;

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    nome_usuario VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    genero VARCHAR(15) NOT NULL,
    data_nascimento DATE NOT NULL,
    senha VARCHAR(50) NOT NULL

);

select * from usuarios;

insert into usuarios(nome, nome_usuario, email, telefone, genero, data_nascimento, senha)
values ('Jesus', 'jesus_sanguebom', 'jesus.cristo@deus.com', '81000000000', 'masculino', '0000-12-15', 'amem');

delete from usuarios where id = 4;