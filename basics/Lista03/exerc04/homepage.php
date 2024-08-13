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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    
    <script src="script.js"></script>
    <!-- <script>
      $( function() 
      {
        var icons = 
        {
          header: "ui-icon-circle-arrow-e",
          activeHeader: "ui-icon-circle-arrow-s"
        };
        $( "#accordion" ).accordion({
          icons: icons
        });
        $( "#toggle" ).button().on( "click", function() 
        {
          if ( $( "#accordion" ).accordion( "option", "icons" ) ) 
          {
            $( "#accordion" ).accordion( "option", "icons", null );
          } else {
            $( "#accordion" ).accordion( "option", "icons", icons );
          }
        });
      });
    </script> -->
    </head>

    <body>
        <header>
            <h2>🌐 PHP WebCode Development Wonderland 🐘</h2>
            <h3 id="idcabelho">  Fundamentos PHP - Lista03 <br>Exercicio 04
            </h3> 
        </header>
        <nav>
            <ul>
                <li><a href="/web/index.html">Home</a></li>

                <li><a href="opt02.html">Teste a opção 02</a></li>
                <li><a href="#tutorials">Tutoriais</a></li>
                <li><a href="#highlights">Destaques</a></li>
                <li><a href="#contributions">Contribuições</a></li>
            </ul>
        </nav>
  
    <h1 id="idcabelho">  My page jQuery UI Accordion - Customize icons<br> Resposta do Servidor</h1>
    
        <div id="accordion">
     <h3><span class="section">Processando Notas de Aluno</span></h3>
        <div>
        <form method="post" action="../exerc01/recebe-dados.php">
        <fieldset>
            <legend> 
                Processando Notas de Aluno
            </legend>

            <label class = 'alinha'> 
                Nome do Aluno:   
            </label>
            <input type = 'text' name="nome-aluno", autofocus> 
            <br>

            <label class = 'alinha'> 
                Nota 01:   
            </label>
            <input type = 'number' name="nota01" min="0"  step="0.1" > 
            <br>
            
            <label class = 'alinha'> 
                Peso da Nota 01:   
            </label>
            <input type = 'number' name="peso01" min="0" step="0.1" > 
            <br>

            <label class = 'alinha'> 
                Nota 02:   
            </label>
            <input type = 'number' name="nota02" min="0"  step="0.1" > 
            <br>
            
            <label class = 'alinha'> 
                Peso da Nota 02:   
            </label>
            <input type = 'number' name="peso02" min="0" step="0.1" > 
            <br>
            
            <button> --Executar-- </button>
           
        </fieldset>
    </form>
        </div>
     <h3><span class="section">Processando dados viagem Maria</span></h3>
          <div>
          <form method="post" action="../exerc02/recebe-dados.php">
            <fieldset>
                <legend> 
                    Processando dados viagem Maria
                </legend>

                <label class = 'alinha'> 
                    Distancia da viagem (em KM):   
                </label>
                <input type = 'number' name="distancia" min="0" step="0.1", autofocus> 
                <br>

                <label class = 'alinha'> 
                    Consumo do automovel:   
                </label>
                <input type = 'number' name="consumo" min="0"  step="0.1" > 
                <br>
                
                <label class = 'alinha'> 
                    Preco do combustivel:   
                </label>
                <input type = 'number' name="preco" min="0" step="0.1" > 
                <br>
                
                <button> --Executar-- </button>
              
            </fieldset>
        </form>
        </div>
     <h3><span class="section">Calculo de Venda</span></h3>
        <div>
        <form method="get" action="../exerc03/recebe-dados.php">
            <fieldset>
                <legend> 
                    Calculo de Venda
                </legend>

                <label class = 'alinha'> 
                    Informe o valor da venda:   
                </label>
                <input type = 'number' name="valorVenda" min="0" step="0.01", autofocus> 
                <br>
                
                <button> --Executar-- </button>
              
            </fieldset>
        </form>
        </div>
      <h3><span class="section">Conversor de Temperatura</span></h3>
        <div>
        <form method="get" action="recebe-dados.php">
            <fieldset>
                <legend> 
                    Temperatura em Fahrenheit:
                </legend>

                <label class = 'alinha'> 
                    Informe o valor da venda:   
                </label>
                <input type = 'number' name="fahrenheit" min="0" step="0.01", autofocus> 
                <br>
                
                <button> --Executar-- </button>
              
            </fieldset>
        </form>
        </div>
    
  
      <button id="toggle">Toggle icons</button>
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

     <script type="text/javascript"> 
        $(document).ready(function () {
            alert("Woooohoooo!!");
        
    });
    </script>

</html>



