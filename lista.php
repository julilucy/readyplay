<?php

require 'C:\xampp\htdocs\readyplay\php\form.php';

$lista = [];


$sql = $conn->query("SELECT * FROM usuarios");

if($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ready Play</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <img src="src\readyplay.png" alt="Logo" class="navbar-brand logo">
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Inicio
                            </a>
                        </li>
                        <br>
                                          
                        <li class="nav-item">
                            <a class="nav-link" href="./index.html">
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
                            <a class="nav-link" href="#">
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
                            <fieldset>
                            <legend><b>Lista de Usuários</b></legend>
                            </fieldset>

                            

                            <?php foreach($lista as $usuarios){ ?>
                            
                            <fieldset>

                            <div class="barra-lista"></div>

                            <div class="tabelas">
                                <div class="tabela1">
                                    <ul>
                                        <li>ID</li>
                                        <li>NOME</li>
                                        <li>NOME DE USUARIO</li>
                                        <li>EMAIL</li>
                                        <li>TELEFONE</li>
                                        <li>GENERO</li>
                                        <li>DATA DE NASCIMENTO</li>
                                        <li>
                                            OPÇÕES
                                        </li>
                                    </ul>
                                </div>

                                <div class="tabela2">
                                    <ul>
                                        <li><?=$usuarios['id'];?></li>
                                        <li><?=$usuarios['nome'];?></li>
                                        <li><?=$usuarios['nome_usuario'];?></li>
                                        <li><?=$usuarios['email'];?></li>
                                        <li><?=$usuarios['telefone'];?></li>
                                        <li><?=$usuarios['genero'];?></li>
                                        <li><?=$usuarios['data_nascimento'];?></li>
                                        <li>
                                            <a href="./php/editar.php?id=<?=$usuarios['id'];?>">Editar</a>
                                            / /
                                            <a href="./php/excluir.php?id=<?=$usuarios['id'];?>">Excluir</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>


                            </fieldset>

                            <?php } ?>
                                
                            
                                
                        
                            
                    </div>

            </main>
</body>

</html>