
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resp_PHP</title>
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="shortcut icon" type="imagex/png" href="/web/icons/icon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;1,200;1,400&family=Red+Hat+Display:wght@400;500;700&family=Roboto&display=swap"
    rel="stylesheet">

        
    </head>
    <body>
        <h2 id="idcabelho">  Prática com PHP em Subrotinas - Lista06 - Exercicio 02<br> <span class="blinking-text">Resposta do Servidor</span></h2>
        <nav>
            <ul>
                <li><a href="/web/index.html">Home</a></li>
                <li><a href="./index.html">Voltar</a></li>
                
            </ul>
        </nav>

        <?php
            //recebendo dados de formularios e armazenando em variaveis e criar a matriz de indice numerico para armazenar as 3 notas
            if (isset($_POST['nome-idade'])) 
            {
                function testaridade($arg_Idade)
                {
                    //Funcao que testa os argumento
                    $valorTestado = filter_var($arg_Iddade, FILTER_VALIDADE_INT);
                    if ($valorTestado === false OR $valorTestado < 0) // operador === compara tipo e não o conteudo
                    {
                        exit("<p>Dado incorreto. Idade incorreta</p>");
                    }
                };

                function aptoVotar($idade)
                {
                    if ($idade >= 18)
                    {
                        Echo "Apto a votar";
                    }
                    else
                    {
                        Echo "Não esta apto a votar";
                    };
                }        

                $idade = $_POST['nome-idade'];
                testarIdade($idade);
                aptoVotar($idade);
                echo "";
            }
                
        ?>
        
    </body>

    <footer>
    <div class="footer-container">
        <div class="logo">
            <img src="/web/icons/icon36x36.ico" width="30" alt="Logo">
        </div>
        <div class="info">
            <div>&copy; 2024 HTML / CSS / JavaScript</div>
            <div>Desenvolvido por: Carlos Hayden Junior</div>
        </div>
        <div class="icons">
            <img src="/web/icons/icon-html5-48.png" width="20" alt="HTML Icon">
            <img src="/web/icons/icon-css3-48.ico" width="20" alt="CSS Icon">
            <img src="/web/icons/icons8-js-48.png" width="20" alt="JS Icon">
        </div>
    </div>
</footer>

    
    </html>
    
   
