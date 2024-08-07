
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JavaScript</title>
        <link rel="stylesheet" href="08_exerc.css">
        <link rel="shortcut icon" type="imagex/png" href="../icons/icon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;1,200;1,400&family=Red+Hat+Display:wght@400;500;700&family=Roboto&display=swap"
    rel="stylesheet">

        
    </head>
    <body>
        <h1 id="idcabelho">  Fundamentos do PHP - Lista03 - Exercicio 01 - resposta do servidor</h1>

        <?php
        //recebendo dados de formularios e armazenando em variaveis
        $nomeDoAluno = $_POST['nome-aluno'];
        $nota01      = $_POST['nota01'];
        $peso01      = $_POST['peso01'];
        $nota02      = $_POST['nota02'];
        $peso02      = $_POST['peso02'];
        
        $media = ($nota01 + $peso01 * $nota02 + $peso02) / ($peso01 + $peso02);

        echo "<p> Notas do Aluno:<br>
                Nome do Aluno: $nomeDoAluno<br>
                Media onderada: $media
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
    
   
