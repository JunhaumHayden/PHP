<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Includes em PHP </title> 
  <link rel="stylesheet" href="desafio.css">
</head> 

<body>
  <h1> Fundamentos do PHP com POO - atividade 1 </h1>
  <?php
   //implementando uma classe em PHP
   class Item
    {
    //variáveis de instância
    public $nome;
    public $preco;
    public $categoria;

    //métodos da classe - método do tipo getter
    function mostrarCategoria()
     {
     return $this->categoria;
     }

    //métodos setter
    function modificarPreco($novoPreco)
     {
     $this->preco = $novoPreco;
     }

    //método getter - mostrar preço
    function mostrarPreco()
     {
     return $this->preco;
     }
    }

  //script principal - criando o objeto por meio do construtor padrão da classe
  $item1 = new Item();
  //adicionando atributos ao objeto
  $item1->nome = "Impressora";
  $item1->categoria = "Periférico";
  $item1->preco = 550.12;

  //mostrar a categoria do objeto
  echo "<p> Categoria do item cadastrado = ", $item1->mostrarCategoria(), "</p>";

  //mostrar o preço do item
  $preco = $item1->mostrarPreco();
  echo "<p> Preço do item cadastrado = $preco </p>";

  //alterar o preço do item, por meio do setter
  $item1->modificarPreco(700);

  //mostrar o novo preço
  $preco = $item1->mostrarPreco();
  echo "<p> Novo preço do item = $preco </p>";
  ?>
</body>
</html>