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
            <h3 id="idcabelho">  Conta Bancaria com POO em PHP
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
  
        <h1 id="idcabelho">  Fundamentos do PHP com POO - Atividade 03</h1>
        <?php
         //impementar uma classe
            Class ContaBancaria{
                public $saldo;
                function __construct($saldo){
                    $this->saldo = $saldo;
                }
                function depositar($valor){
                    $this->saldo +=$valor;
                }    
                function sacar($valor){
                    $this->saldo -= $valor;
                }
                function mostrarSaldo(){
                return $this->saldo;
                }
            }
            $conta01 = new ContaBancaria(20000.01);
            echo "<p> O Seu saldo é de R$".$conta01->mostrarSaldo()."</p>";
            $conta01->depositar(10000);
            echo "<p> O Seu saldo é de R$".$conta01->mostrarSaldo()."</p>";
            $conta01->sacar(500);
            echo "<p> O Seu saldo é de R$".$conta01->mostrarSaldo()."</p>";

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



