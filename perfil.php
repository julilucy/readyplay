<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ready Play - Perfil do Usuário</title>
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
                            <a class="nav-link" href="#">
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
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container">
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <?php
                $host = "localhost";
                $usuario = "root";
                $senha = "root";
                $banco = "readyplay";

                $conn = new mysqli($host, $usuario, $senha, $banco);

                if ($conn->connect_error) {
                    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
                }
                $idUsuario = 1; 
                $sql = "SELECT * FROM usuarios WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $idUsuario);
                $stmt->execute();
                $result = $stmt->get_result();
                $usuario = $result->fetch_assoc();

                if ($usuario) {
                    echo "<h1>Olá, " . $usuario["nomeusuario"] . "!</h1>";
                    echo "<p>Nome completo: " . $usuario["nome"] . "</p>";
                    echo "<p>Email: " . $usuario["email"] . "</p>";
                    echo "<p>Telefone: " . $usuario["telefone"] . "</p>";
                    echo "<p>Gênero: " . $usuario["genero"] . "</p>";
                    echo "<p>Data de Nascimento: " . $usuario["data_nascimento"] . "</p>";

                
                    echo "<a href='editar.php?id=" . $usuario["id"] . "' class='btn btn-warning'><i class='bi bi-pencil'></i> Editar</a>";
                    echo "<a href='excluir.php?id=" . $usuario["id"] . "' class='btn btn-danger'><i class='bi bi-trash'></i> Excluir</a>";
                } else {
                    echo "<p>Usuário não encontrado.</p>";
                }

                $stmt->close();
                $conn->close();
                ?>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
