
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
        <h1 id="idcabelho">  Fundamentos do PHP - Lista03 - Exercicio 10<br> Resposta do Servidor WebCode Development</h1>
        <nav>
            <ul>
                <li><a href="/web/index.html">Home</a></li>
                <li><a href="./index.html">Voltar</a></li>
                
            </ul>
        </nav>
        <?php
            //recebendo dados de formularios e armazenando em variaveis
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Verifica se uma faixa etária foi selecionada
                if (!isset($_POST['faixa_etaria'])) {
                    echo "<h3>Por favor, selecione a faixa etária do cliente.</h3>";
                    exit;
                }
        
                $valorVenda = floatval($_POST['valor_compra']);
                $valor_compra = floatval($_POST['valor_compra']);
                $faixa_etaria = $_POST['faixa_etaria'];
                $cartao_fidelidade = isset($_POST['cartao_fidelidade']) ? $_POST['cartao_fidelidade'] : "Não";
        
                // Aplicar desconto conforme a faixa etária
                if ($faixa_etaria == "55_70") {
                    $valor_compra *= 0.95; // 5% de desconto
                } elseif ($faixa_etaria == "acima_70") {
                    $valor_compra *= 0.93; // 7% de desconto
                }
        
                // Aplicar desconto adicional de 5% se usar o cartão de fidelidade
                if ($cartao_fidelidade == "sim") {
                    $valor_compra *= 0.95; // 5% de desconto adicional
                }

            // Exibindo os resultados
            // Após usar a mascara de formatação será devolvido uma String e não um numero. Por isso, é feita apenas quando não precisamos utilizar as variaveis formatadas para calculos numeros. A formatacao deve ser feita antes de enviar ao cliente.
            echo "<h3>Resultados:</h3>";
            echo "<p>Valor da Compra: R$ " . number_format($valorVenda, 2, ',', '.') . "<br>";
            echo "<p>Aplicado Cartão Fidelidade: " . $cartao_fidelidade . "<br>";
            echo "Valor Final do Pagamento da CompraR$ " . number_format($valor_compra, 2, ',', '.') . "<br>";
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
    
   
