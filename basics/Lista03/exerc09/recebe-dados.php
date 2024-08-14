
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
        <h1 id="idcabelho">  Fundamentos do PHP - Lista03 - Exercicio 08<br> Resposta do Servidor WebCode Development</h1>
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
            $valor_compra = floatval($_POST['valorVenda']);
            // Em vez de usar botões de rádio, o script verifica se as checkboxes foram marcadas usando isset(). Se uma checkbox foi marcada, a variável correspondente ($pagamento_cartao ou $entrega_domicilio) receberá o valor "sim", caso contrário, será null.
            $forma_pagamento = $_POST['forma_pagamento'];
            $cartao_visa = isset($_POST['cartao_visa']) ? $_POST['cartao_visa'] : null;

            
            
             // Aplicar desconto ou acréscimo conforme a forma de pagamento
            if ($forma_pagamento == "avista") {
                $valor_compra *= 0.95; // 5% de desconto
            } elseif ($forma_pagamento == "aprazo") {
                $valor_compra *= 1.02; // 2% de acréscimo
            }

             // Aplicar taxa de 2% se houver entrega domiciliar
            if ($entrega_domicilio == "sim") {
                $valor_compra *= 1.02; // 2% de taxa de entrega
            }

            // Exibindo os resultados
            // Após usar a mascara de formatação será devolvido uma String e não um numero. Por isso, é feita apenas quando não precisamos utilizar as variaveis formatadas para calculos numeros. A formatacao deve ser feita antes de enviar ao cliente.
            echo "<h3>Resultados:</h3>";
            echo "<p>Valor da Compra: R$ " . number_format($valorVenda, 2, ',', '.') . "<br>";
            echo "<p>Forma de Pagamento: " . $forma_pagamento . "<br>";
            echo "Valor Final do Pagamento da CompraR$ " . number_format($valor_compra, 2, ',', '.') . "<br>";
             // Verificar se o cliente está apto ao sorteio
            if ($cartao_visa == "sim") {
                echo "<h3>Você está apto a participar do sorteio!</h3>";
                echo '<form method="post" action="sorteio.php">';
                echo '<input type="hidden" name="valor_compra" value="' . $valor_compra . '">';
                echo '<button type="submit">Ir para a Página do Sorteio</button>';
                echo '</form>';
            } else {
                echo "<h3>Você não está apto a participar do sorteio.</h3>";
            }
            
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
    
   
