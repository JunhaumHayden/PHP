
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
        <h2 id="idcabelho">  Tratamento de matrizes em PHP - Lista05 - Exercicio 06<br> <span class="blinking-text">Resposta do Servidor</span></h2>
        <nav>
            <ul>
                <li><a href="/web/index.html">Home</a></li>
                <li><a href="./index.html">Voltar</a></li>
                
            </ul>
        </nav>

        <?php
            //recebendo dados de formularios e armazenando em variaveis e criar a matriz de indice numerico para armazenar as 3 notas
            if (isset($_POST['nome-medicamento01'])) 
            {

                $matrizMedicamentos = [
                    $_POST['codigo_medicamento01'] => [$_POST['nome-medicamento01'],$_POST['preco-medicamento01']],
                    $_POST['codigo_medicamento02'] => [$_Post['nome-medicamento02'],$_POST['preco-medicamento02']],
                    $_POST['codigo_medicamento03'] => [$_POST['nome-medicamento03'],$_POST['preco-medicamento03']]
                ];
            }
            $codigoPesquisado = $_POST['pesquisa-medicamento'];
            
            // Mostrar os dados em formato tabular
            echo "<h3>Notas dos Alunos</h3>";
            echo "<table>
                    <caption> CTDS - PRWI - rendimento semestral do aluno </caption>
                    <tr>
                        <th> Matricula do aluno</th>
                        <th> Nome do aluno</th>
                        <th> Media de PRWI</th>
                    </tr>";
                    //Percorrer a matriz para montar a tabela na pagina web.
                    //foreach (nome_matriz as indice => variavel_auxiliar)
            foreach($matrizMedicamentos as $codigo => $vetorInterno)
            {
                $vetorAuxilixar[$codigo] = $vetorInterno[1];
                echo "<tr>
                        <td> $codigo </td>
                        <td> $vetorInterno[0] </td>
                        <td> $vetorInterno </td>
                      </tr>";
            }
            echo "</table>";
            $precoMedicamentoMaisBarato = min($vetorAuxilixar);
            $codigoMedicamentoMaisBarato = array_search($precoMedicamentoMaisBarato,$matrizMedicamentos);
             
        ?>
    </body>

    <footer>
    <div class="footer-container">
        <div class="logo">
            <img src="/web/icons/icon36x36.ico" width="30" alt="Logo">
        </div>
        <div class="info">
            <div>&copy; 2024 HTML / CSS / JavaScript</div>
            <div>Desenvolvido por: Carlos Hayden Junior</div>
        </div>
        <div class="icons">
            <img src="/web/icons/icon-html5-48.png" width="20" alt="HTML Icon">
            <img src="/web/icons/icon-css3-48.ico" width="20" alt="CSS Icon">
            <img src="/web/icons/icons8-js-48.png" width="20" alt="JS Icon">
        </div>
    </div>
</footer>

    
    </html>
    
   
