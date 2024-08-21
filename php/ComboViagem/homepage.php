<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Viagens PHP</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" type="imagex/png" href="/web/icons/icon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;1,200;1,400&family=Red+Hat+Display:wght@400;500;700&family=Roboto&display=swap"
    rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    
    <script src="script.js"></script>
    
    </head>

    <body>
        <header>
            <h2>🌐 PHP WebCode Development Wonderland 🐘</h2>
            <h3 id="idcabelho">  Calculadora Utilidades em PHP
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
  
    <h1 id="idcabelho">  My page jQuery UI Accordion - Customize icons</h1>
    
        <div id="accordion">
     <h3><span class="section">Conversor de Dólares para Reais</span></h3>
        <div>
        <form method="post" action="/web/basics/Lista03_SimpleVariables/05_Conversor_Moeda/recebe-dados.php">
        <fieldset>
                <legend> 
                    Conversor de Dólares para Reais
                </legend>

                <label class = 'alinha'> 
                    Valor em Dólares (USD):   
                </label>
                <input type = 'number' name="dolares" min="0" step="0.01", autofocus> 
                <br>
            
            <button> --Executar-- </button>
           
        </fieldset>
    </form>
        </div>
     <h3><span class="section">Calcular Despesas de Viagem</span></h3>
          <div>
          <form method="post" action="/web/basics/Lista03_SimpleVariables/02_Calculo_Dados_Viagem/recebe-dados.php">
            <fieldset>
                <legend> 
                    Processando dados viagem
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
     <h3><span class="section">Calcular Despesas de Supermercado</span></h3>
        <div>
        <form method="get" action="/web/basics/Lista03_SimpleVariables/08_Calcular_Supermercado_v2/recebe-dados.php">
            <fieldset>
            <legend> 
                    Calculadora de Compras do Supermercado
                </legend>

                <label class = 'alinha'> 
                    Informe o valor Total da Compra (R$):   
                </label>
                <input type = 'number' name="valorVenda" min="0" step="0.01", autofocus> 
                <br>

                <label for="pagamento_cartao">Opções:</label><br>
                <input type="checkbox" id="pagamento_cartao" name="pagamento_cartao" value="sim">
                <label for="pagamento_cartao">Pagamento com Cartão (5% de desconto)</label><br>
                
                <input type="checkbox" id="entrega_domicilio" name="entrega_domicilio" value="sim">
                <label for="entrega_domicilio">Entrega Domiciliar (2% de taxa)</label><br><br>
                
                <button> --Executar-- </button>
              
            </fieldset>
        </form>
        </div>
      <h3><span class="section">Conversor de Temperatura</span></h3>
        <div>
        <form method="get" action="/web/basics/Lista03_SimpleVariables/04_Conversor_Temperatura/recebe-dados.php">
            <fieldset>
                <legend> 
                Conversor de Fahrenheit para Celsius
                </legend>

                <label class = 'alinha'> 
                Temperatura em Fahrenheit:   
                </label>
                <input type = 'number' name="fahrenheit" min="0" step="0.01", autofocus> 
                <br>
                
                <button> --Executar-- </button>
              
            </fieldset>
        </form>
        </div>
    
  
      <button id="toggle" class="btn">Toggle icons</button>
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



