
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
        <h1 id="idcabelho">  Fundamentos do PHP - Lista03 - Exercicio 09<br> Resultado do Sorteio do WebCode Development</h1>
        <nav>
            <ul>
                <li><a href="/web/index.html">Home</a></li>
                <li><a href="./index.html">Voltar</a></li>
                
            </ul>
        </nav>
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['valor_compra'])) {
        $valor_compra = floatval($_POST['valor_compra']);
        $ultimos_digitos = intval(substr(number_format($valor_compra, 2, '', ''), -2));
        
        // Gerando número aleatório entre 00 e 99
        $numero_sorteado = rand(0, 99);

        echo "<p>Últimos dígitos do valor da compra: $ultimos_digitos</p>";
        echo "<p>Número sorteado: $numero_sorteado</p>";

        // Comparar os últimos dígitos do valor da compra com o número sorteado
        if ($ultimos_digitos === $numero_sorteado) {
            echo "<h3>Parabéns! Você ganhou o sorteio!</h3>";
        } else {
            echo "<h3>Que pena, você não ganhou desta vez. Tente novamente!</h3>";
        }
    } else {
        echo "<p>Ocorreu um erro. Por favor, tente novamente.</p>";
    }
    ?>

    <a href="index.php">Voltar</a>
        
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
    
   
