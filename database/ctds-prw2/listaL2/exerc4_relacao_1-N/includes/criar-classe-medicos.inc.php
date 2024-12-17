<?php
    class Medico
    {
        public $id;
        public $nome;
        public $crm;

        function receberDados($conexao)
        {
            // $id         = trim($_POST['id']);
            $nome      = trim($conexao->escape_string($_POST['nome-medico']));
            $crm     = trim($conexao->escape_string($_POST['crm']));


            //atribuir as variáveis às propriedades da instãncia da classe
            // $this->id         = $id;
            $this->nome      = $nome;
            $this->crm    = $crm;
        }
        
        //implementando o método de cadastro dos dados de cada aluno na tabela do banco de dados
        function cadastrar($conexao, $nomeDaTabela){
            $sql = "INSERT $nomeDaTabela (nome,crm) VALUES(
                        '$this->nome',
                        '$this->crm')";
            // apostrofo apenas para dados do tipo varchar, numeros nao necessitam

            $conexao->query($sql) OR die($conexao->error);
        }

        function contarNumeroPacientesAtendidos($conexao, $nomeDaTabela01,$nomeDaTabela02){
            $medicoPesquisado = trim($conexao->escape_string($_POST['pesquisar-nome-medico']));
         // Consulta o nome do medico na tabela e caso o nome esteja na tabela, retorna o CRM. Caso não esteja, dispara um erro fatal e, com um aviso apropriado, encerrar a aplicação.
            $sql = "SELECT crm FROM $nomeDaTabela01 WHERE nome='$medicoPesquisado'";
            $resultado = $conexao->query($sql) or die($conexao->error);
            //testar se o medico nao foi encontrado
            if($conexao->affected_rows == 0){
                die("<p> Médico não encontrado. <span> $medicoPesquisado </span> não registrado</p>");
            }
            // medico pesquisado foi encontrado
            $vetorRegistro = $resultado->fetch_array();
            $crm = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");

            $sql = "SELECT COUNT(*) FROM $nomeDaTabela02 WHERE crm_medico='$crm'";
            $resultado = $conexao->query($sql) OR die ($conexao->error);
            $vetorRegistro = $resultado->fetch_array();
            $quantos = $vetorRegistro[0];
            echo "<p> Numero de pacientes para o medico <span> $medicoPesquisado </span> e de <span> $quantos </span> </p>"; 
        }
 }
 ?>
