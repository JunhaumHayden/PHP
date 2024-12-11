<?php

class LivroDAO
{
    private mysqli $conexao;

    public function __construct(mysqli $conexao)
    {
        $this->conexao = $conexao;
    }

    public function cadastrar(Livro $livro, string $nomeDaTabela): void
    {
        $sql = "INSERT INTO $nomeDaTabela (isbn, titulo, autor, preco, data_lancamento) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param(
            'sssds',
            $livro->getIsbn(),
            $livro->getTitulo(),
            $livro->getAutor(),
            $livro->getPreco(),
            $livro->getDataLancamento()->format('Y-m-d')
        );
        $stmt->execute();
        if ($stmt->error) {
            throw new Exception("Erro ao cadastrar livro: " . $stmt->error);
        }
    }

    public function listarTodos(string $nomeDaTabela): array
    {
        $sql = "SELECT * FROM $nomeDaTabela";
        $result = $this->conexao->query($sql);

        $livros = [];
        while ($row = $result->fetch_assoc()) {
            $livros[] = Livro::comAtributos(
                $row['isbn'],
                $row['titulo'],
                $row['autor'],
                (float) $row['preco'],
                new DateTime($row['data_lancamento'])
            );
        }

        return $livros;
    }
}
