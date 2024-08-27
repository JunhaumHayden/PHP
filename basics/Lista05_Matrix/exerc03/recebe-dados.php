
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
        <h2 id="idcabelho">  Tratamento de vetores em PHP - Lista 04 - Exercicio 03<br><span class="blinking-text">Resposta do Servidor</span></h2>
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
                $vetorAlunos = [
                    $_POST['nome-aluno01'] => floatval($_POST['nota01']), 
                    $_POST['nome-aluno02'] => floatval($_POST['nota02']), 
                    $_POST['nome-aluno03'] => floatval($_POST['nota03'])
                ];
            }

            // Ordenar o vetor de forma decrescente (da maior nota para a menor)
            // A função arsort($alunos) é usada para ordenar o array associativo em ordem decrescente de acordo com as notas.
        arsort($vetorAlunos);
            // Mostrar os dados em formato tabular
            echo "<h3>Notas dos Alunos</h3>";
            echo "<table>
                    <tr>
                        <th> Nome do Aluno</th>
                        <th> Nota de PRWI</th>
                    </tr>";
            foreach($vetorAlunos as $nome => $nota)
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
    
   
