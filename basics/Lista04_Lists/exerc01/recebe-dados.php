
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resp_PHP</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" type="imagex/png" href="/web/icons/icon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;1,200;1,400&family=Red+Hat+Display:wght@400;500;700&family=Roboto&display=swap"
    rel="stylesheet">

        
    </head>
    <body>
        <h1 id="idcabelho">  Tratamento de vetores em PHP - Lista04 - Exercicio 01<br> <span class="blinking-text">Resposta do Servidor</span></h1>
        <nav>
            <ul>
                <li><a href="/web/index.html">Home</a></li>
                <li><a href="./index.html">Voltar</a></li>
                
            </ul>
        </nav>

        <?php
            //recebendo dados de formularios e armazenando em variaveis e criar o vetor de indice numerico para armazenar as 3 notas
            $nomeDoAluno   = $_POST['nome-aluno'];
            $vetorNotas[0] = $_POST['nota01'];
            $vetorNotas[1] = $_POST['nota02'];
            $vetorNotas[3] = $_POST['nota03'];

            // // Calcular media
            // echo "<p>";
            // foreach($vetorNotas as $x)
            // {
            //     echo "Nota do aluno = $x <br>";
            // }
            // echo "</p>";

            $soma = array_sum($vetorNotas);
            $media = $soma/count($vetorNotas);
            

            echo "<p> <h3>Notas do Aluno:</h3><br>
                    Nome do Aluno: $nomeDoAluno<br>
                    Media onderada: <span>". number_format($media, 1,",",".") . "</span><br>";
            foreach($vetorNotas as $x)
            {
                echo "Nota do aluno = $x <br>";
            }
            echo "</p>";

            // modos de representacao
            echo "<p> Veja essas outras maneiras de apresentar o vetor em PHP<br>";
            // Modo bruto
            print_r($vetorNotas);
            // Modo Formatado
            echo "<pre>"; // tag para preformatacao em html
            print_r($vetorNotas);
            echo "</pre>";
            echo "</p>";
        ?>
        
    </body>

    <footer>
        <table>
            <tr> 
                <td>
                    <div class="logo">
                        <img src="/web/icons/icon36x36.ico" width="30" alt="Logo">
                    </div>    
                </td> 
                <td>
                    <div class="info">
                        <div>&copy; 2024 HTML / CSS / JavaScript</div>
                        <div>Desenvolvido por: Carlos Hayden Junior</div>
                    </div>
                </td> 
                <td>
                    <div class="icons">
                        <img src="/web/icons/icon-html5-48.png" width="20" alt="HTML Icon">
                    </div>
                </td> 
                <td>
                    <div class="icons">
                        <img src="/web/icons/icon-css3-48.ico" width="20" alt="CSS Icon">
                    </div>
                </td> 
                <td>
                    <div class="icons">
                        <img src="/web/icons/icons8-js-48.png" width="20" alt="JS Icon">
                    </div>
                </td> 
            </tr>
        </table>
    </footer> 
    
    </html>
    
   
