
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
        <h2 id="idcabelho">  Tratamento de vetores em PHP - Lista 04 - Exercicio 04<br><span class="blinking-text">Resposta do Servidor</span></h2>
        <nav>
            <ul>
                <li><a href="/web/index.html">Home</a></li>
                <li><a href="./index.html">Voltar</a></li>
                
            </ul>
        </nav>

        <?php
            //recebendo dados de formularios e armazenando em variaveis e criar o vetor de indice numerico para armazenar as 3 notas
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                $vetorPrecos = [
                    impressora => floatval(800.17), 
                    placaVideo => floatval(600.27), 
                    mouse => floatval(80.66)
                ];
            }

            if(isset($_POST['produtos'])){
                exit("<p> Não adiquiriu produtos</p>");
            }
            //recebendo dados do checkbox, vindo do formulário. Lembrar que o PHP ja armazena os dados de um checkbox em um vetor.
            $vetorProdutosComprados = $_POST['produtos'];
            //Laço de repetiçao para iterar sobre o vetor de produto comprado.
            $soma = 0;
            foreach($vetorProdutosComprados as $valTempProd)
            {
                $soma += $vetorPrecos[$valTempProd];
            }
            // Mostrar os dados em formato tabular
            echo "<h3>Relacao de produtos</h3>";
            echo "<table>
                    <tr>
                        <th> Produto</th>
                        <th> Preco</th>
                    </tr>";
            foreach($vetorProdutosComprados as $nome => $nota)
            {
                echo "<tr>
                        <td> $nome </td>
                        <td> $nota  </td>
                      </tr>";
            }
            echo "</table>";

            // Encontrar o aluno com a maior nota
        $nomeMaiorNota = array_keys($vetorAlunos, max($vetorAlunos))[0];
        $maiorNota = $vetorAlunos[$nomeMaiorNota];

        // Mostrar o nome e a nota do aluno com a maior nota
        echo "<h3>Aluno com Maior Nota</h3>";
        echo "<p>Nome: {$nomeMaiorNota}<br>";
        echo "Nota: {$maiorNota}</p>";

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
    
   
