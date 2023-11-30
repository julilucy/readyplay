<?php

require 'C:\xampp\htdocs\readyplay\php\form.php';

$usuarios = [];

$id = filter_input(INPUT_GET, 'id');

if($id){
    $sql = $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindvalue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $usuarios = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: /readyplay/index.html");
        exit;
    }
} else {
    header("Location: /readyplay/index.html");
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ready Play  ||  Editar Cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <img src="../src/readyplay.png" alt="Logo" class="navbar-brand logo">
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Inicio
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.html">
                                Cadastro
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Jogos
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Contato
                            </a>
                        </li>
                    </ul>
                    <div class="separador">
                        <div class="barra"></div>
                    </div>
                    <ul class="nav flex-column">     
                        <li class="nav-item">
                            <a class="nav-link" id="dev-mode" href="#">
                                DEV MODE
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link" href="../lista.php">
                                Lista de Usuários
                            </a>
                        </li>
                        <br>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="container">
                    <div class="box">
                        <form action="" method="post">
                            <fieldset>
                                <legend><b>Editar Usuário</b></legend>
                                <br>

                                <input type="hidden" name="id" id="id" value="<?=$usuarios['id'];?>">

                                <div class="inputBox">
                                    <input type="text" name="nome" id="nome" class="inputUser" value="<?=$usuarios['nome'];?>"  required>
                                    <label for="nome" class="labelInput">Nome completo</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="nome_usuario" id="nome_usuario" class="inputUser" value="<?=$usuarios['nome_usuario'];?>" required>
                                    <label for="nome_usuario" class="labelInput">Nome de Usuário</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="email" id="email" class="inputUser" value="<?=$usuarios['email'];?>" required>
                                    <label for="email" class="labelInput">Email</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?=$usuarios['telefone'];?>" required>
                                    <label for="telefone" class="labelInput">Telefone</label>
                                </div>
                                <br><br>
                                <p>Sexo:</p>
                                <input type="radio" id="feminino" name="genero" value="feminino" value="<?=$usuarios['genero'];?>" required>
                                <label for="feminino">Feminino</label>
                                <br>
                                <input type="radio" id="masculino" name="genero" value="masculino" value="<?=$usuarios['genero'];?>" required>
                                <label for="masculino">Masculino</label>
                                <br>
                                <input type="radio" id="outro" name="genero" value="outro" value="<?=$usuarios['genero'];?>" required>
                                <label for="outro">Outro</label>
                                <br><br>
                                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                                <input type="date" name="data_nascimento" id="data_nascimento" value="<?=$usuarios['data_nascimento'];?>" required>
                                <br><br>
                                <div class="inputBox">
                                    <input type="password" name="senha" id="senha" class="inputUser" required>
                                    <label for="senha" class="labelInput">Senha</label>
                                    <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="password" name="confirma-senha" id="confirma-senha" class="inputUser" required>
                                    <label for="senha" class="labelInput">Confirmar Senha</label>
                                    <i class="bi bi-eye-fill" id="btn-senha2" onclick="mostrarConfirma()"></i>
                                    <br><br>
                                    <button type="submit" id="submit" class="btn btn-primary">Enviar</button>
                            </fieldset>
                        </form>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

                    <script>
                        function mostrarSenha() {
                            var inputPass = document.getElementById('senha')
                            var btnShowPass = document.getElementById('btn-senha')

                            if (inputPass.type === 'password') {
                                inputPass.setAttribute('type', 'text')
                                btnShowPass.classList.replace('bi-eye-fill', 'bi-eye-slash-fill')
                            } else {
                                inputPass.setAttribute('type', 'password')
                                btnShowPass.classList.replace('bi-eye-slash-fill', 'bi-eye-fill')
                            }
                        }

                        function mostrarConfirma() {
                            var inputPass = document.getElementById('confirma-senha')
                            var btnShowPass = document.getElementById('btn-senha2')

                            if (inputPass.type === 'password') {
                                inputPass.setAttribute('type', 'text')
                                btnShowPass.classList.replace('bi-eye-fill', 'bi-eye-slash-fill')
                            } else {
                                inputPass.setAttribute('type', 'password')
                                btnShowPass.classList.replace('bi-eye-slash-fill', 'bi-eye-fill')
                            }
                        }
                    </script>

                    <?php

                    $id = filter_input(INPUT_POST, 'id');
                    $nome = filter_input(INPUT_POST, 'nome');
                    $nome_usuario = filter_input(INPUT_POST, 'nome_usuario');
                    $email = filter_input(INPUT_POST, 'email');
                    $telefone = filter_input(INPUT_POST, 'telefone');
                    $genero = filter_input(INPUT_POST, 'genero');
                    $data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
                    $senha = filter_input(INPUT_POST, 'senha');
                    $confirma_senha = filter_input(INPUT_POST, 'confirma-senha');

                    if($id){
                        if($senha === $confirma_senha){

                            $sql = $conn->prepare("UPDATE usuarios SET nome = :nome, nome_usuario = :nome_usuario, email = :email, telefone = :telefone, genero = :genero, data_nascimento = :data_nascimento, senha = :senha WHERE id = :id");

                            $sql->bindvalue(":id", $id);
                            $sql->bindvalue(":nome", $nome);
                            $sql->bindvalue(":nome_usuario", $nome_usuario);
                            $sql->bindvalue(":email", $email);
                            $sql->bindvalue(":telefone", $telefone);
                            $sql->bindvalue(":genero", $genero);
                            $sql->bindvalue(":data_nascimento", $data_nascimento);
                            $sql->bindvalue(":senha", $senha);

                            $sql->execute();

                            header("Location: /readyplay/lista.php");
                        

                        } else {
                            echo '<script>alert("Senhas não batem!");</script>';
                        }
                    }
                    


                    
                    ?>
</body>

</html>