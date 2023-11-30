<?php

require 'C:\xampp\htdocs\readyplay\php\form.php';

$nome = filter_input(INPUT_POST, 'nome');
$nome_usuario = filter_input(INPUT_POST, 'nome_usuario');
$email = filter_input(INPUT_POST, 'email');
$telefone = filter_input(INPUT_POST, 'telefone');
$genero = filter_input(INPUT_POST, 'genero');
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
$senha_insegura = filter_input(INPUT_POST, 'senha');
$senha = password_hash($senha_insegura, PASSWORD_DEFAULT);

$sql = $conn->prepare("INSERT INTO usuarios (nome, nome_usuario, email, telefone, genero, data_nascimento, senha) 
    VALUES (:nome, :nome_usuario, :email, :telefone, :genero, :data_nascimento, :senha)");

$sql->bindvalue(":nome", $nome);
$sql->bindvalue(":nome_usuario", $nome_usuario);
$sql->bindvalue(":email", $email);
$sql->bindvalue(":telefone", $telefone);
$sql->bindvalue(":genero", $genero);
$sql->bindvalue(":data_nascimento", $data_nascimento);
$sql->bindvalue(":senha", $senha);

$sql->execute();

header("Location: /readyplay/lista.php");
