
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" type="imagex/png" href="/web/icons/icon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;1,200;1,400&family=Red+Hat+Display:wght@400;500;700&family=Roboto&display=swap"
    rel="stylesheet">

        
    </head>
    <body>
        <h1 id="idcabelho">  Fundamentos do PHP - Lista03 - Exercicio 04 - resposta do servidor</h1>
        <nav>
            <ul>
                <li><a href="/web/index.html">Home</a></li>
                <li><a href="./index.html">Voltar</a></li>
                
            </ul>
        </nav>
        <?php
            // Definindo a taxa de câmbio como uma constante
            define('TAXA_CAMBIO', 5.20); // Exemplo: 1 USD = 5,20 BRL
            //recebendo dados de formularios e armazenando em variaveis
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dolares'])) {
                $dolares = floatval($_POST['dolares']);
                
                // Convertendo dólares para reais
                $reais = $dolares * TAXA_CAMBIO;
        
                // Exibindo os resultados
                echo "<h3>Resultado da Conversão:</h3>";
                echo "<p>Valor em Reais (BRL): R$ " . number_format($reais, 2, ',', '.') . "<br>";
                echo "Taxa de câmbio utilizada: " . number_format(TAXA_CAMBIO, 2, ',', '.') . " BRL por USD</p>";
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
    
   