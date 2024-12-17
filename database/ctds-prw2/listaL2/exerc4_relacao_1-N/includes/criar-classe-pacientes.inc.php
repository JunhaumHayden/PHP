<?php
    class Paciente
    {
        public $nome;
        public $crmMedico;
        public $dataInternacao;

        function receberDados($conexao)
        {
            // $id         = trim($_POST['id']);
            $nome    = trim($conexao->escape_string($_POST['nome-paciente']));
            $crm     = trim($conexao->escape_string($_POST['crm-medico']));
            $data    = trim($conexao->escape_string($_POST['data-internacao']));


            //atribuir as variáveis às propriedades da instãncia da classe
            // $this->id         = $id;
            $this->nome          = $nome;
            $this->crmMedico     = $crm;
            $this->dataInternacao= $data;
        }
        
        //implementando o método de cadastro dos dados de cada aluno na tabela do banco de dados
        function cadastrar($conexao, $nomeDaTabela){
            $sql = "INSERT $nomeDaTabela VALUES(
                        null,
                        '$this->nome',
                        '$this->dataInternacao',
                        '$this->crmMedico')";
            // apostrofo apenas para dados do tipo varchar, numeros nao necessitam

            $conexao->query($sql) OR die($conexao->error);
        }
 }
 ?>
