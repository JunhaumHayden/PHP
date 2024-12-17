<?php

class Livro
{
    // Atributos privados com tipos definidos
    private string $isbn;
    private string $titulo;
    private string $autor;
    private float $preco;
    private DateTime $dataLancamento;

    // Construtor para inicializar os atributos
    public function __construct(string $isbn, string $titulo, string $autor, float $preco, DateTime $dataLancamento)
    {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->setPreco($preco);
        $this->dataLancamento = $dataLancamento;
    }

    // Método estático para criar uma instância com atributos
    public static function comAtributos(
        string $isbn,
        string $titulo,
        string $autor,
        float $preco,
        DateTime $dataLancamento
    ): self {
        return new self($isbn, $titulo, $autor, $preco, $dataLancamento);
    }

    // Métodos Getters
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getAutor(): string
    {
        return $this->autor;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getDataLancamento(): DateTime
    {
        return $this->dataLancamento;
    }

    // Métodos Setters com validações
    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function setAutor(string $autor): void
    {
        $this->autor = $autor;
    }

    public function setPreco(float $preco): void
    {
        if ($preco < 0) {
            throw new InvalidArgumentException("O preço não pode ser negativo.");
        }
        $this->preco = $preco;
    }

    public function setDataLancamento(DateTime $dataLancamento): void
    {
        $this->dataLancamento = $dataLancamento;
    }
}
