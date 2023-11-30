<?php
$host = "localhost";
$usuario = "root";
$senha = "root";
$banco = "readyplay";

/* $conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
} */

try{
    $conn = new PDO("mysql:dbname=".$banco.";host".$host, $usuario, $senha);
} catch(PDOException $err){
    throw new Exception("Falha na conexão com o banco de dados: " . $err);
}
?>
