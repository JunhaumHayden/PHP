<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> POO com PHP </title> 
  <link rel="stylesheet" href="desafio.css">
</head> 

<body>
  <h1> Fundamentos do PHP com POO - atividade 1 </h1>
  <?php
   //criando a classe Curso
   class Curso 
    {
    public $curso;
    public $duracao;

    //declarando o método construtor da class
    function __construct($inicializaCurso, $inicializaDuracao)
     {
     $this->curso   = $inicializaCurso;
     $this->duracao = $inicializaDuracao;
     }

    //declarando o método que classifica o curso
    function classificarCurso()
     {
     //classificar o curso de acordo com sua duração
     if($this->duracao <= 1)
      {
      $mensagem = "Curso de curta duração";
      }
     elseif($this->duracao <= 3)
      {
      $mensagem = "Curso de média duração";
      }
     else
      {
      $mensagem = "Curso de longa duração";
      }
     return $mensagem;
     }
    }
  
  //script principal - criar dois objetos curso e inicializá-los por meio do construtor
  $curso1 = new Curso("CTDS", 3);
  $curso2 = new Curso("CSTGTI", 6);

  //mostrar nome, duração e classificação de cada curso
  $classific1 = $curso1->classificarCurso();
  $classific2 = $curso2->classificarCurso();

  echo "<p> Resultado do processamento de informação dos cursos: <br>
            Classificação do curso 1 = $classific1 <br>
            Classificação do curso 2 = $classific2 <br>
            Nome do curso 1          = $curso1->curso <br>
            Duração do curso 1       = $curso1->duracao <br>
            Nome do curso 2          = $curso2->curso <br>
            Duração do curso 2       = $curso2->duracao </p>";   
  ?>
</body>
</html>