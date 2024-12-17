<?php
    class Veiculo
    {
        public $fabricante;
        public $modelo;
        public $placa;
        public $cpfProprietário;

        function receberDados($conexao)
        {
            // $id         = trim($_POST['id']);
            $fabricante    = trim($conexao->escape_string($_POST['fabricante']));
            $modelo     = trim($conexao->escape_string($_POST['modelo']));
            $placa    = trim($conexao->escape_string($_POST['placa']));
            $cpf    = trim($conexao->escape_string($_POST['cpf']));


            //atribuir as variáveis às propriedades da instãncia da classe
            // $this->id         = $id;
            $this->fabricante             = $fabricante;
            $this->modelo          = $modelo;
            $this->placa           = $placa;
            $this->cpfProprietário = $cpf;
        }
        
        //implementando o método de cadastro dos dados de cada aluno na tabela do banco de dados
        function cadastrar($conexao, $nomeDaTabela){
            $sql = "INSERT $nomeDaTabela (id, fabricante, modelo, placa, cpf_proprietario) VALUES(
                        null,
                        '$this->fabricante',
                        '$this->modelo',
                        '$this->placa',
                        '$this->cpfProprietário')";
            // apostrofo apenas para dados do tipo varchar, numeros nao necessitam

            $conexao->query($sql) OR die($conexao->error);
        }
 }
 ?>
