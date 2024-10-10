<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>POO PHP</title>
        <link rel="stylesheet" href="/PHP/assets/css/style.css">
        <link rel="shortcut icon" type="imagex/png" href="/PHP/assets/icons/icon.ico">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;1,200;1,400&family=Red+Hat+Display:wght@400;500;700&family=Roboto&display=swap"
    rel="stylesheet">
        <script src="script.js"></script>
    </head>

    <body>
        <header>
            <h2>🌐 PHP WebCode Development Wonderland 🐘</h2>
            <h3 id="idcabelho">  POO em PHP
            </h3> 
        </header>
        <nav>
            <ul>
                <li><a href="/web/index.html">Home</a></li>

                <li><a href="index.html">Voltar</a></li>
                <li><a href="#tutorials">Tutoriais</a></li>
                <li><a href="#highlights">Destaques</a></li>
                <li><a href="#contributions">Contribuições</a></li>
            </ul>
        </nav>
  
        <h1 id="idcabelho">  Fundamentos do PHP com POO - Atividade 01</h1>
        <?php
         //impementar uma classe
            class Item{
                //variaveis de instancia
                public $nome;
                public $preco;
                public $categoria;

                //metodos da classe - metodo do tipo getter
                function mostrarCategoria(){
                    return $this->categoria;
                }
                function mostrarPreco(){
                    return $this->preco;
                }
                function modificarPreco($novoPreco){
                    $this->preco = $novoPreco;
                }
            }
            $item01 = new Item();
            $item01->nome = "Impressora";
            $item01->categoria = "Periferico";
            $item01->preco = 550.12;
            echo "<p> Categoria: = ".$item01->mostrarCategoria()." </p>";

            echo "<p> Preco : ".$item01->mostrarPreco()."</p>";

            $item01->modificarPreco(440.40);
            echo "<p> Preco : ".$item01->mostrarPreco()."</p>";
        ?>
   
        <footer>
            <div class="footer-container">
                <div class="logo">
                    <img src="/PHP/assets/icons/icon36x36.ico" width="30" alt="Logo">
                </div>
                <div class="info">
                    <div>&copy; 2024 HTML / CSS / JavaScript / PHP</div>
                    <div>Desenvolvido por: Carlos Hayden Junior</div>
                </div>
                <div class="icons">
                    <img src="/PHP/assets/icons/icon-html5-48.png" width="20" alt="HTML Icon">
                    <img src="/PHP/assets/icons/icon-css3-48.ico" width="20" alt="CSS Icon">
                    <img src="/PHP/assets/icons/icons8-js-48.png" width="20" alt="JS Icon">
                    <img src="/PHP/assets/icons/icons-php-48.ico" width="20" alt="PHP Icon">
                    
                </div>
            </div>
        </footer>
    </body>
</html>



