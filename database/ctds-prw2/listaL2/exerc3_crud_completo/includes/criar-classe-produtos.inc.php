<?php
    class Produto
    {
        public $id;
        public $preco;
        public $estoque;

        function receberDados($conexao)
        {
            $id         = trim($_POST['id']);
            $preco      = trim($_POST['preco']);
            $estoque     = trim($_POST["estoque"]);

            $id       = $conexao->escape_string($id);
            $preco    = $conexao->escape_string($preco);
            $estoque    = $conexao->escape_string($estoque);

            //atribuir as variáveis às propriedades da instãncia da classe
            $this->id         = $id;
            $this->preco      = $preco;
            $this->estoque    = $estoque;
        }
        
        //implementando o método de cadastro dos dados de cada aluno na tabela do banco de dados
        function cadastrar($conexao, $nomeDaTabela){
            $sql = "INSERT $nomeDaTabela VALUES(
                        '$this->id', 
                        $this->preco,
                        $this->estoque)";
            // apostrofo apenas para dados do tipo varchar, numeros nao necessitam

            $conexao->query($sql) OR die($conexao->error);
        }
            //metodo para alterar preco
            function alterarPreco($conexao, $nomeDaTabela){
                // 1 - obter o id do formulario
                $idPesquisado = trim($conexao->escape_string($_POST["procura-id"]));
                // 2 - obter o preco do formulario
                $novoPreco = trim($conexao->escape_string($_POST["altera-preco"]));
                // 3 - montar a string sql
                $sql = "UPDATE $nomeDaTabela SET preco=$novoPreco WHERE id=$idPesquisado;";
                $conexao->query($sql) or die($conexao->error);
                if($conexao->affected_rows == 0){
                    exit ("<p>O Id <span>$idPesquisado </span> não encontrado!</p>");
                }
            }

            //metodo para alterar preco
            function excluirProduto($conexao, $nomeDaTabela){
                $estoqueMinimo = trim($conexao->escape_string($_POST["exclui-produto"]));
                // 1 - montar a string sql
                $sql = "DELETE FROM $nomeDaTabela WHERE estoque < $estoqueMinimo;";
                //exemplo de interacao com o usuario
                echo "<script>
                alert(' Excluindo registro!');
              </script>";
                $conexao->query($sql) or die($conexao->error);
                if($conexao->affected_rows > 0){
                    //exemplo de interacao com o usuario
                    echo "<p> Exclusao realizada com sucesso<br>
                    Produtos abaixo de <span> $estoqueMinimo</span> foram excluido.<br>
                    Totalizando <span> $conexao->affected_rows produtos</span>";
                }else {
                    echo "<p> Não houve movimentacao<br>
                    Não ha Produtos abaixo de <span> $estoqueMinimo</span> para exclucao.<br>
                    Totalizando <span> $conexao->affected_rows produtos</span>";
                }
            }


 }
