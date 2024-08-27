
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
        <h2 id="idcabelho">  Tratamento de matrizes em PHP - Lista05 - Exercicio 01<br> <span class="blinking-text">Resposta do Servidor</span></h2>
        <nav>
            <ul>
                <li><a href="/web/index.html">Home</a></li>
                <li><a href="./index.html">Voltar</a></li>
                
            </ul>
        </nav>

        <?php
            //recebendo dados de formularios e armazenando em variaveis e criar a matriz de indice numerico para armazenar as 3 notas
            if (isset($_POST['nome-aluno01'])) 
            {
                $aluno01 = $_POST['nome-aluno01'];
                $aluno02 = $_POST['nome-aluno02'];
                $aluno03 = $_POST['nome-aluno03'];

                $matricula01 = $_POST['matricula-aluno01'];
                $matricula02 = $_POST['matricula-aluno02'];
                $matricula03 = $_POST['matricula-aluno03'];

                $media01 = $_POST['nota-aluno01'];
                $media02 = $_POST['nota-aluno02'];
                $media03 = $_POST['nota-aluno03'];

                $matrizAlunos['$matricula01'][0] = '$aluno01';
                $matrizAlunos['$matricula01'][1] = '$media01';
                $matrizAlunos['$matricula02'][0] = '$aluno02';
                $matrizAlunos['$matricula02'][1] = '$media02';
                $matrizAlunos['$matricula03'][0] = '$aluno03';
                $matrizAlunos['$matricula03'][1] = '$media03';


                    $matrizAlunos=[
                        ['$matricula01'][0] => '$aluno01',
                        ['$matricula01'][1] => '$media01',
                        ['$matricula02'][0] => '$aluno02',
                        ['$matricula02'][1] => '$media02',
                        ['$matricula03'][0] => '$aluno03',
                        ['$matricula03'][1] => '$media03',
                    ];

                // $matrizAlunos = [
                //     [$_POST['matricula-aluno01']][0] => $_POST['nome-aluno01'],
                //     [$_POST['matricula-aluno01']][1] => $_POST['nota-aluno01'],
                //     [$_POST['matricula-aluno02']][0] => $_POST['nome-aluno02'],
                //     [$_POST['matricula-aluno02']][1] => $_POST['nota-aluno02'],
                //     [$_POST['matricula-aluno03']][0] => $_POST['nome-aluno03'],
                //     [$_POST['matricula-aluno03']][1] => $_POST['nota-aluno03']
                // ];
            }

            echo "<pre>";
            print_r($matrizAlunos);
            echo "</pre>";
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
            foreach($matrizAlunos as $matric => $vetorInterno)
            {
                echo "<tr>
                        <td> $matric </td>
                        <td> $vetorInterno[0] </td>
                        <td> $vetorInterno[1] </td>
                      </tr>";
            }
            echo "</table>";

            // calcular a media geral
        $nomeMaiorNota = array_keys($vetorAlunos, max($vetorAlunos))[0];
        $maiorNota = $vetorAlunos[$nomeMaiorNota];

        // Mostrar o nome e a nota do aluno com a maior nota
        echo "<h3>Aluno com Maior Nota</h3>";
        echo "<p>Nome: {$nomeMaiorNota}<br>";
        echo "Nota: {$maiorNota}</p>";

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
    
   
