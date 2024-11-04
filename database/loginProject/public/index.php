<?php
// Caminho relativo para incluir o arquivo conexao.php
// __DIR__ retorna o diretório atual do arquivo index.php, que está em public/.
// Usamos __DIR__ . '/../src/conexao.php' para especificar o caminho de index.php para src/conexao.php subindo um nível (..).
// include_once garante que conexao.php seja incluído uma única vez, evitando duplicações.
include_once __DIR__ . '/../src/conexao.php';


if(isset($_POST['email']) || isset($_POST['senha'])) {
    //Teste de verificaçao se foi digitado usuario e senha
    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        //metodo do MySQLi para implementar segurança sobre SQL injection
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        // SQL query
        $sql_code = "SELECT * FROM user WHERE email = '$email' AND pwd = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();
            // $_SSESSION é uma variavel valida mesmo trocando de pagina no php
            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: ../src/painel.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
   <!-- ... -->
   <link rel="shortcut icon" type="imagex/png" href="/PHP/assets/icon.ico">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;1,200;1,400&family=Red+Hat+Display:wght@400;500;700&family=Roboto&display=swap"
   rel="stylesheet">
   <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
   <!-- Import da font-awesome -->
   <link rel='stylesheet' type='text/css' media='screen'         
         href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css'>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS especifico do bloco de login e senha -->
    <style> 
        /* Estilização da section para centralizar o formulário de login 
           Define o layout centralizado da página, usando flexbox para centralizar o formulário tanto na horizontal quanto na vertical.*/
        .painel-login { 
            display: flex;               /* Define que o elemento é flex*/
            justify-content: center;     /* Centraliza horizontalmente */
            align-items: center;         /* Centraliza verticalmente */
            height: 100vh;               /* Ocupa toda a altura da tela */
            background-color: #f8f9fa; /* Cor de fundo clara */
        }
        /* Estilos para o formulário de login 
           Ajusta o design do formulário de login, incluindo largura máxima, espaçamento, cor de fundo, bordas arredondadas e uma sombra suave.*/
        .login-form {
            width: 100%;                /* Ocupa toda a largura disponível */
            max-width: 380px;           /* Largura máxima */
            padding: 15px;              /* Espaçamento interno */
            background: #ffffff;      /* Fundo branco */
            border-radius: 10px;        /* Bordas arredondadas */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        }
        /* Estilo para remover a sombra azul padrão ao focar no campo 
        Remove o efeito de sombra padrão do Bootstrap quando o campo é focado, substituindo por uma borda azul discreta.*/
        .form-control:focus {
            box-shadow: none;
            border-color: #007bff; /* Cor de borda azul */
        }
    </style>
</head>
<body>
    <header>
        <h1>🌐 WebCode Development Wonderland 🐘</h1>
    </header>
    <nav>
        <ul>
            <li><a href="../">Início</a></li>
            <li><a href="index.html">Voltar</a></li>
            <li><a href="build.html">Versao02</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="cards.html">Cards</a></li>
            <li><a href="tel:+5548988900001">Contato</a></li>
        </ul>
    </nav>
    <section class="painel-login">
        <div class="login-form">
            <form action="" method="POST">
                <h3 class="text-center">Acesse sua conta</h3> <!-- Título centralizado -->
                <div class="mb-3"> <!-- Campo de entrada para nome de usuário -->
                    <label for="username" class="form-label">Username</label>
                    <input name="email" type="text" class="form-control" id="username" placeholder="Enter username">
                </div>
                <div class="mb-3"> <!-- Campo de entrada para senha -->
                    <label for="password" class="form-label">Password</label>
                    <input name="senha" type="password" class="form-control" id="password" placeholder="Enter password">
                </div>
                <div class="d-grid"> <!-- Botão de login ocupando toda a largura disponível -->
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="mt-3 text-center"> <!-- Link para recuperação de senha -->
                    <a href="#">Forgot password?</a>
                </div>
                <div class="mt-2 text-center"> <!-- Link para criar nova conta -->
                    <span>Don't have an account? <a href="#">Sign Up</a></span>
                </div>
            </form>
        </div>
    </section>
    <footer>
        <div class="corta">
            <div class="opcao">
                <i class="fa-solid fa-home"></i>
                Home
            </div>
            <div class="opcao">
                <i class="fa-solid fa-file"></i>
                Op 1
            </div>
            <div class="opcao">
                <i class="fa-solid fa-gear"></i>
                Op 2
            </div>
        </div>
        <div class="corta">
            <div class="footer-container">
                <div class="logo">
                    <img src="/PHP/assets/icons/icon36x36.ico" width="30" alt="Logo">
                </div>
                <div class="info">
                    <div>&copy; 2024 HTML / CSS / BootStrap</div>
                    <div>Desenvolvido por: Carlos Hayden Junior</div>
                </div>
                <div class="icons">
                    <img src="/PHP/assets/icons/icon-html5-48.png" width="20" alt="HTML Icon">
                    <img src="/PHP/assets/icons/icon-css3-48.ico" width="20" alt="CSS Icon">
                    <img src="/PHP/assets/icons/icons8-js-48.png" width="20" alt="JS Icon">
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS (optional for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>