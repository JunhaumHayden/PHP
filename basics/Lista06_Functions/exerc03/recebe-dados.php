
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
        <h2 id="idcabelho">  Prática com PHP em Subrotinas - Lista06 - Exercicio 03<br><span class="blinking-text">Resposta do Servidor</span></h2>
        <nav>
            <ul>
                <li><a href="/web/index.html">Home</a></li>
                <li><a href="./index.html">Voltar</a></li>
                
            </ul>
        </nav>

        <?php
            //recebendo dados de formularios e armazenando em variaveis e criar o vetor de indice numerico para armazenar as 3 notas
            function converterDeFparaC($temp)
            {
                $tempConvertida = ($temp - 32) * 5/9;
                echo "<p> Resultado da conversao: <br>
                        Temperatura original em ºF = <span>{$temp}ºF</span><br>
                        Temperatura Convertida para ºC = <span> {$tempConvertida}ºC</span></p>";
            }
            function converterDeCparaF($temp)
            {
                $tempConvertida = ($temp * 9/5) + 32;
                echo "<p> Resultado da conversao: <br>
                        Temperatura original em ºF = <span>{$temp}ºF</span><br>
                        Temperatura Convertida para ºC = <span> {$tempConvertida}ºC</span></p>";
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                $temp = $_POST['nome-temperatura'];
                $escala = $_POST['nome-escala'];

            }

            if($escala == "deFparaC")
            {
                converterDeFparaC($temp);
            }
            else{
                converterDeCparaF($temp);
            }

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
    
   
