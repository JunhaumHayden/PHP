<?php
    class Cliente
    {
        public $id;
        public $nome;
        public $endereco;
        public $email;
        public $celular;
        public $cpf;
        public $usuario;
        public $senha;

        function receberDados($conexao)
        {
            // $id         = trim($_POST['id']);
            $nome      = trim($conexao->escape_string($_POST['cliente']));
            $endereco  = trim($conexao->escape_string($_POST['endereco']));
            $email     = trim($conexao->escape_string($_POST['email']));
            $celular   = trim($conexao->escape_string($_POST['celular']));
            $cpf       = trim($conexao->escape_string($_POST['cpf']));
            $usuario   = trim($conexao->escape_string($_POST['login']));
            $senha     = trim($conexao->escape_string($_POST['senha']));


            //atribuir as variáveis às propriedades da instãncia da classe
            // $this->id         = $id;
            $this->nome      = $nome;
            $this->endereco  = $endereco;
            $this->email     = $email;
            $this->celular   = $celular;
            $this->cpf       = $cpf;
            $this->usuario   = $usuario;
            $this->senha     = $senha;
        }
        
        //implementando o método de cadastro dos dados de cada aluno na tabela do banco de dados
        function cadastrar($conexao, $nomeDaTabela){
            $sql = "INSERT $nomeDaTabela (nome, endereco, email, celular, cpf, usuario, senha) VALUES(
                        '$this->nome',
                        '$this->endereco',
                        '$this->email',
                        '$this->celular',
                        '$this->cpf',
                        '$this->usuario',
                        '$this->senha')";
            // apostrofo apenas para dados do tipo varchar, numeros nao necessitam

            $conexao->query($sql) OR die($conexao->error);
        }
 }
 ?>
