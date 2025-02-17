
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resp_PHP</title>
        <link rel="stylesheet" href="/PHP/assets/css/style.css">
        <link rel="shortcut icon" type="imagex/png" href="/web/icons/icon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;1,200;1,400&family=Red+Hat+Display:wght@400;500;700&family=Roboto&display=swap"
    rel="stylesheet">  
    </head>
    <body>
        <h2 id="idcabelho">  Prática com PHP em Includes - Lista07 - Exercicio 04<br><span class="blinking-text">Resposta do Servidor</span></h2>
        <nav>
            <ul>
                <li><a href="/PHP/index.html">Home</a></li>
                <li><a href="./index.html">Voltar</a></li>
                
            </ul>
        </nav>

        <?php
            // Incluindo o arquivo com as funções
            require 'func_converte.inc.php';
        
            // recebendo dados de formularios e armazenando em variaveis e criar o vetor de indice numerico para armazenar as 3 notas
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                $nomeAluno = $_POST['aluno'];
                $nota01    = $_POST['nota01'];
                $peso01    = $_POST['peso01'];
                $nota02    = $_POST['nota02'];
                $peso02    = $_POST['peso02'];
                $nota03    = $_POST['nota03'];
                $peso03    = $_POST['peso03'];
                $media_escolhida = $_POST['media'];
            }

            // Aplicar desconto de 5% se o pagamento for com cartão
            if ($media_escolhida == "sim") {
                $media = aritimetica($nota01, $nota02, $nota03);
                echo "<p> Media do Aluno:<br>
                Nome do Aluno: $nomeAluno<br>
                Media Aritmetica: $media
                </p>";

            }

             // Aplicar taxa de 2% se houver entrega domiciliar
            if ($media_escolhida == "nao") {
                $media = ponderada($nota01, $nota02, $nota03, $peso01, $peso02, $peso03);
                echo "<p> Notas do Aluno:<br>
                Nome do Aluno: $nomeAluno<br>
                Media Ponderada: $media
                </p>";
            }

        ?>
        
        <footer>
            <div class="footer-container">
                <div class="logo">
                    <img src="/assets/icons/icon36x36.ico" width="30" alt="Logo">
                </div>
                <div class="info">
                    <div>&copy; 2024 HTML / CSS / JavaScript</div>
                    <div>Desenvolvido por: Carlos Hayden Junior</div>
                </div>
                <div class="icons">
                    <img src="/assets/icons/icon-html5-48.png" width="20" alt="HTML Icon">
                    <img src="/assets/icons/icon-css3-48.ico" width="20" alt="CSS Icon">
                    <img src="/assets/icons/icons8-js-48.png" width="20" alt="JS Icon">
                </div>
            </div>
        </footer> 
    </body>
    </html>
    
   
