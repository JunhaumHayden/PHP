
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JavaScript</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" type="imagex/png" href="../icons/icon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;1,200;1,400&family=Red+Hat+Display:wght@400;500;700&family=Roboto&display=swap"
    rel="stylesheet">

        
    </head>
    <body>
        <h1 id="idcabelho">  Fundamentos do PHP - Lista03 - Exercicio 01 - resposta do servidor</h1>

        <?php
        //recebendo dados de formularios e armazenando em variaveis
        $distancia  = $_POST['distancia'];
        $consumo    = $_POST['consumo'];
        $preco      = $_POST['preco'];
        
        $quantosLitros = $distancia / $consumo;
        $despesa       = $quantosLitros * $preco;

        echo "<p> Resultado do processamento da viagem:<br>
                Litros de combustivel gastos na viage: <span>$quantosLitros</span><br>
                Gasto em dinheiro: <span>$despesa</span>
                </p>";
    ?>
        
    </body>

    <footer>
        <table>
            <tr> 
                <td>
                    <div class="logo">
                        <img src="../icons/icon36x36.ico" width="30" alt="Logo">
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
                        <img src="../icons/icon-html5-48.png" width="20" alt="HTML Icon">
                    </div>
                </td> 
                <td>
                    <div class="icons">
                        <img src="../icons/icon-css3-48.ico" width="20" alt="CSS Icon">
                    </div>
                </td> 
                <td>
                    <div class="icons">
                        <img src="../icons/icons8-js-48.png" width="20" alt="JS Icon">
                    </div>
                </td> 
            </tr>
        </table>
    </footer> 
    
    </html>
    
   
