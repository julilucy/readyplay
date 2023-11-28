<?php
$host = "localhost";
$usuario = "root";
$senha = "root";
$banco = "readyplay";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $nomeusuario = $_POST["nomeusuario"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $genero = $_POST["genero"];
    $data_nascimento = $_POST["data_nascimento"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, nomeusuario, email, telefone, genero, data_nascimento, senha) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Erro na preparação da instrução SQL: " . $conn->error);
    }

    $stmt->bind_param("sssssss", $nome, $nomeusuario, $email, $telefone, $genero, $data_nascimento, $senha);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
        echo "SQL executada: " . $sql;
    }
    

    $stmt->close();
    $conn->close();
}
?>