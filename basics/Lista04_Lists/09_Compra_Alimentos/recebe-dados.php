
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
        <h1 id="idcabelho">  Tratamento de vetores em PHP - Lista 04<br> Resposta do Servidor WebCode Development</h1>
        <nav>
            <ul>
                <li><a href="./index.html">Voltar</a></li>
                
            </ul>
        </nav>
        <?php
        // verificao se o formulário foi enviado
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {   
                //Criar o vetor de preços de cada item
                $vetorPrecos = ["arroz" => 4.50,
                                "feijao" => 7.00,
                                "oleo" => 6.20,
                                "macarrao" => 3.50];


                //Teste caso nenhum produto comprado e Sair exibindo uma mensagem caso verdadeiro
                if(!isset($_POST['produtos']))
                {
                exit("<p> Caro usuário, você não adquiriu nenhum de nossos produtos. O valor final da sua compra é de <span> R$0,00 </span>. Volte sempre! </p>");
                }

                //Receber os dados do checkbox, vindos do formulário.
                $vetorProdutosComprados = $_POST['produtos'];
            
                // Calcular o total somando os valores dos produtos selecionados.
                $total = 0.0;
        
                foreach ($vetorProdutosComprados as $prod) {
                    $total += $vetorPrecos[$prod];
                }
                // Aplica o desconto de 5% caso marcado a opção de pagamento com cartão de fidelidade
                if (isset($_POST['fidelidade'])) {
                    
                    $total *= 0.95; 
                    echo "<p>Valor Final da Compra: <span> R$ " . number_format($total, 2, ',', '.') . "</span><br>Você obteve 5% de desconto com o cartão fidelidade</p>";
                }
                else{
                    echo "<p>Valor Final da Compra: <span> R$ " . number_format($total, 2, ',', '.') . "</span></p>";
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
    
   
