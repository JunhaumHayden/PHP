
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
        //recebendo dados de formularios e armazenando em variaveis
        if (isset($_GET['fahrenheit'])) {
            $fahrenheit = floatval($_GET['fahrenheit']);
        
            // Convertendo Fahrenheit para Celsius
            $celsius = ($fahrenheit - 32) * (5 / 9);
    
            // Exibindo o resultado
            echo "<h3>Resultado:</h3>";
            echo "<p>A temperatura em Celsius é: " . number_format($celsius, 2, ',', '.') . "°C</p>";
        }
    
        ?>
         <footer>
            <div class="footer-container">
                <div class="logo">
                    <img src="/PHP/assets/icons/icon36x36.ico" width="30" alt="Logo">
                </div>
                <div class="info">
                    <div>&copy; 2024 HTML / CSS / JavaScript / PHP</div>
                    <div>Desenvolvido por: Carlos Hayden Junior</div>
                </div>
                <div class="icons">
                    <img src="/PHP/assets/icons/icon-html5-48.png" width="20" alt="HTML Icon">
                    <img src="/PHP/assets/icons/icon-css3-48.ico" width="20" alt="CSS Icon">
                    <img src="/PHP/assets/icons/icons8-js-48.png" width="20" alt="JS Icon">
                    <img src="/PHP/assets/icons/icons-php-48.ico" width="20" alt="PHP Icon">
                    
                </div>
            </div>
        </footer>
        
    </body>
    </html>
    
   
