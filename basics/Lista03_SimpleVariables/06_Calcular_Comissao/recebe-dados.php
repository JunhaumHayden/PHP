
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
        <h1 id="idcabelho">  Fundamentos do PHP - Lista03 - Exercicio 06<br> Resposta do Servidor WebCode Development</h1>
        <nav>
            <ul>
                <li><a href="/web/index.html">Home</a></li>
                <li><a href="./index.html">Voltar</a></li>
                
            </ul>
        </nav>
        <?php
            //recebendo dados de formularios e armazenando em variaveis
        if (isset($_POST['valorVenda'])) {
            $valorVenda = floatval($_POST['valorVenda']);
            $taxaComissao = floatval($_POST['valorComissao']);
            
            // Calculando os valores
            $valorComissao = $valorVenda * ($taxaComissao / 100);
            $valorLoja = $valorVenda - $valorComissao;
    
            // Exibindo os resultados
            // Após usar a mascara de formatação será devolvido uma String e não um numero. Por isso, é feita apenas quando não precisamos utilizar as variaveis formatadas para calculos numeros. A formatacao deve ser feita antes de enviar ao cliente.
            echo "<h3>Resultados:</h3>";
            echo "<p>Valor Total da Compra: R$ " . number_format($valorVenda, 2, ',', '.') . "<br>";
            echo "<p>Taxa de comissao do vendedor é de: " . $taxaComissao . "%<br>";
            echo "O valor da comissao do vendedor é de R$ <span>" . number_format($valorComissao, 2, ',', '.') .  "</span><br>";
            
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
    
   
