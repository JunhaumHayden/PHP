<?php
//Classe que representa um aluno

class Aluno{
    public $matricula;
    public $nome;
    public $media;

    function getNome(){
        return $this->nome;
    }

    function receberDados($connection){
        // funcao TRIM Trata a entrada retirando os espacos em branco
        $matricula = trim($_POST['matric']);
        $nome      = trim($_POST['nome']);
        $media     = trim($_POST["media-prw2"]);

        $matricula = $connection->escape_string($matricula);
        $nome      = $connection->escape_string($nome);
        $media     = $connection->escape_string($media);

        //atribuir as variáveis às propriedades da instãncia da classe
        $this->matricula = $matricula;
        $this->nome      = $nome;
        $this->media     = $media;

        // //metodo para implementar segurança na string passada pelo formulario
        // $this->$matricula = $connection->escape_string(trim($_POST['matric']));
        // $this->$nome = $connection->escape_string(($_POST['nome']));
        // $this->$media = $connection->escape_string(trim($_POST['media-prw2']));
    }

    //implementar o metodo para inserir os dados do formulario na tabela do db
    function cadastrar($connection, $tb_name){
        $sql = "INSERT $tb_name VALUES('$this->matricula','$this->nome',$this->media)";

        $connection->query($sql) || die($connection->error); //metodo que captura o erro, caso haja.
    }


    //Sempre que houver consulta SQL deve-se fazer a filtragem de dados recebidos, evitando ataque de XSS
    function tabularDados($connection, $nomeDaTabela){
        $sql="SELECT * FROM $nomeDaTabela";

        // $resultado = $connection->query($sql) || die($connection->error); //linha com erro
        // o operador || possui precedência maior que o operador de atribuição =. Isso significa que o PHP interpreta essa linha como:

        // $resultado = ($connection->query($sql) || die($connection->error));

        // Aqui, ele primeiro avalia a expressão ($connection->query($sql) || die($connection->error)), o que não é o comportamento desejado, pois faz com que $resultado receba true ou false em vez do resultado da consulta.
        $resultado = $connection->query($sql) or die($connection->error);
        // Nesse caso, o or tem precedência mais baixa que o operador =. 
        // Assim, o PHP interpreta a linha como:

        // ($resultado = $connection->query($sql)) or die($connection->error);

        // Agora, $resultado recebe o resultado da consulta, e a função die() só é executada se $resultado for false, o que é exatamente o comportamento desejado.

        echo "<table>
                <caption>Dados academicos</caption>
                <tr>
                    <th>Matricula</th>
                    <th>Nome do Aluno</th>
                    <th>Media de PRW II</th>
                </tr>
                ";
                // Rertirar os dados do objeto $resultado e colocar os dados em cada celula da tabela web, utilizando a estrutura de repeticao while.
                //$registro - variavel que recebera uma linha do objeto retornado pelo comando sql
                // $resultado - variavel que recebeu o objeto completo do comando SQL.
                // fetch_array() - metodo da classe mysqli_result que separa o objeto em linhas. PHP usa indice associativo vindo do comando SQL, pode-se usar indice numerico tb.
                while($vetorRegistro=$resultado->fetch_array()){
                    $matric=$vetorRegistro[0]; //indice numerico
                    $aluno=$vetorRegistro['nome']; //indice associativo
                    $media=$vetorRegistro[2]; //indice numerico

                    //para implementar seguranca em relacao as entradas vindas do navegador usa-se o metodo htmlentities()
                    // $matric - paramentro para indicar a string vinda do navegador
                    // ENT_QOUTES - parametro padrao da verificacao
                    //"ÜTF-8" - parametro para manter a codificaçao dos caracteres em UTF-8
                    $matric = htmlentities($matric, ENT_QUOTES,"UTF-8");
                    $aluno = htmlentities($aluno, ENT_QUOTES,"UTF-8");
                    $media = htmlentities($media, ENT_QUOTES,"UTF-8");

                    echo "<tr>
                            <td>$matric </td>
                            <td>$aluno</td>
                            <td>$media</td>
                        </tr>  
                    ";
                }
                echo "</table>";
    }

    //Implementa metodo para contar o numero de alunos aprovados
    function contarAprovados($conaxao,$nomeDaTabela){
        $sql="SELECT COUNT* FROM $nomeDaTabela WHERE media >=6";
        $resultado = $connection->query($sql) or exit($connection->error);
        $vetorRegistro = $resultado->fetch_array();
        $numeroAprovados=$vetorRegistro[0];
        $numeroAprovados=htmlentities($numeroAprovados, ENT_QOUTES, "UTF-8");
        echo " $numeroAprovados ";
    }
}
?>