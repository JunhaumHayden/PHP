<?php
 class Clube 
    {
        public $id;
        public $nome;
        public $estado;
        public $titulos;
        
        function receberDados($conexao)
        {
            $estado           = $conexao->escape_string($_POST['estado']);
            $nome             = $conexao->escape_string($_POST['nome']);
            $titulos   = $conexao->escape_string($_POST["titulos"]);

            $this->estado         = $estado;
            $this->nome           = $nome;
            $this->titulos = $titulos;
        }

        function cadastrar($conexao, $nomeDaTabela)
        {
            $sql = "INSERT INTO $nomeDaTabela (nome, estado, titulos) VALUES(
                    '$this->nome',
                    '$this->estado',
                    $this->titulos)";

            $conexao->query($sql) || die($conexao->error);
        }

        function mostrarTodosClubesBicampeoes($conexao, $nomeDaTabela){
            $sql = "SELECT * FROM $nomeDaTabela WHERE titulos = 2";
            $resultado = $conexao->query($sql) OR die($conexao->error);
            if($conexao->affected_rows == 0){
                echo "<p> Não há clubes que são exatamente bicampeões cadastrados </p>";
            } else {
                echo "<table>
                <caption> Clubes, atualmente, bicampeões cadastrados: </caption>
                <tr>
                <th>ID</th>
                <th>Nome do Clube</th>
                <th>Nome do Estado</th>
                <th>Número de Campeonatos</th>
                </tr>";

                while ($vetorRegistro = $resultado->fetch_array()) {
                    $id = htmlentities($vetorRegistro['id'], ENT_QUOTES, "UTF-8");
                    $nome = htmlentities($vetorRegistro['nome'], ENT_QUOTES, "UTF-8");
                    $estado = htmlentities($vetorRegistro['estado'], ENT_QUOTES, "UTF-8");
                    $titulos = htmlentities($vetorRegistro['titulos'], ENT_QUOTES, "UTF-8");

                    echo "<tr>
                            <td>$id</td>
                            <td>$nome</td>
                            <td>$estado</td>
                            <td>$titulos</td>
                        </tr>";
                }
                echo "</table>";
            }
            // echo '<button onclick="window.history.back()">Voltar</button>';
        }
        
        function mostrarMaiorClubeCampeao($conexao, $nomeDaTabela){
            $sql = "SELECT * FROM $nomeDaTabela ORDER BY titulos DESC LIMIT 1";
            $resultado = $conexao->query($sql) OR die($conexao->error);
            $vetorRegistro = $resultado->fetch_array();
            if($conexao->affected_rows == 0){
                echo "<p> Não há clubes campeões cadastrados </p>";
            }else{
            echo "<p> Clube com maior número de títulos: É do Estado: <span>$vetorRegistro[2]</span>, nome: <span>$vetorRegistro[1]</span> com <span>$vetorRegistro[3]</span> vitórias</p>";
            }
        }
    }
