
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
        <h1 id="idcabelho">  Fundamentos do PHP - Lista03 - Exercicio 07<br> Resposta do Servidor WebCode Development</h1>
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
            $pagamento_cartao = $_POST['pagamento_cartao'];
            $entrega_domicilio = $_POST['entrega_domicilio'];
            
            
            // Aplicar desconto de 5% se o pagamento for com cartão
            if ($pagamento_cartao == "sim") {
                $valor_compra *= 0.95; // 5% de desconto
            }

             // Aplicar taxa de 2% se houver entrega domiciliar
            if ($entrega_domicilio == "sim") {
                $valor_compra *= 1.02; // 2% de taxa de entrega
            }

            // Exibindo os resultados
            // Após usar a mascara de formatação será devolvido uma String e não um numero. Por isso, é feita apenas quando não precisamos utilizar as variaveis formatadas para calculos numeros. A formatacao deve ser feita antes de enviar ao cliente.
            echo "<h3>Resultados:</h3>";
            echo "<p>Valor Total da Compra: R$ " . number_format($valorVenda, 2, ',', '.') . "<br>";
            echo "<p>Pagamento com cartão amigo: " . $pagamento_cartao . "<br>";
            echo "Solicitado Entrega <span>" . $entrega_domicilio .  "</span><br>";
            echo "Valor Total R$ " . number_format($valor_compra, 2, ',', '.') . "<br>";
            ;
        }
        else{
            exit("<p> ERRO! : A valor não informado<br>Programa será encerrado.</p><br>
                <form action= './index.html' method= 'post'>
                <button> Retornar ao formulario </button>
                </form>");
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
    
   
