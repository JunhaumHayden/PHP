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
        // $matricula = trim($_POST['matric']);
        // $nome      = trim($_POST['nome']);
        // $media     = trim($_POST['media-prw2']);

        //metodo para implementar segurança na string passada pelo formulario
        $this->$matricula = $connection->escape_string(trim($_POST['matric']));
        $this->$nome = $connection->escape_string(($_POST['nome']));
        $this->$media = $connection->escape_string(trim($_POST['media-prw2']));
    }

    //implementar o metodo para inserir os dados do formulario na tabela do db
    function cadastrar($connection, $db_name){
        $sql= "INSERT $db_name VALUES(
        '$this->$matricula', 
        '$this->$nome', 
        $this->$media)";

        $connection->query($sql) || die($connection->error); //metodo que captura o erro, caso haja.
    }
}
?>